<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\DetailPays;
use App\Models\Files;
use App\Models\MenusServices;
use App\Models\Sliders;
use App\Models\Webconfigs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Writer\HTML;

use Smalot\PdfParser\Parser;

class LawController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $webConfig = Webconfigs::find(1);
        $detailPays = DetailPays::find(1);
        $sliders = Sliders::all();
        $menus = MenusServices::whereNull('parent_id')->with('children')->get();
        $files = Files::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->paginate(20);
        return view('users.files.index', compact('files', 'search', 'webConfig', 'menus', 'sliders','detailPays'));
    }


    public function download($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để tải xuống file.');
        }
        $file = Files::findOrFail($id);
        $user = Auth::user();
        if ($user->price < $file->price) {
            return redirect()->back()->with('error', 'Số dư trong tài khoản của bạn không đủ để tải file này.');
        }
        $user->price -= $file->price;
        $user->save();
        $filePath = public_path($file->file);

        if (!file_exists($filePath)) {
            return redirect()->back()->with('error', 'File không tồn tại.');
        }
        return response()->download($filePath);
    }



    public function preview($id)
    {
        $file = Files::findOrFail($id);
        $webConfig = Webconfigs::find(1);
        $detailPays = DetailPays::find(1);
        $sliders = Sliders::all();
        $menus = MenusServices::whereNull('parent_id')->with('children')->get();
        // Check the   $webConfig = Webconfigs::find(1);file extension
        $filePath = public_path($file->file);
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);
        if ($extension === 'pdf') {
            // For PDFs, directly return the view for rendering
            return view('users.files.preview_pdf', compact('file', 'sliders', 'menus', 'webConfig','detailPays'));
        } elseif ($extension === 'docx') {
            // Convert DOCX to HTML and return a partial view
            $content = $this->previewDocx($filePath);
            return view('users.files.preview_docx', compact('content', 'sliders', 'file', 'menus', 'webConfig','detailPays'));
        }

        // For unsupported formats, redirect to download or show an error message
        return redirect()->route('file.download', $id);
    }


    protected function previewDocx($filePath)
    {
        // Load the DOCX file
        $phpWord = IOFactory::load($filePath);

        // Create an HTML writer
        $htmlWriter = new HTML($phpWord);
        $htmlOutput = '';

        // Capture HTML output as a string
        ob_start(); // Start output buffering
        $htmlWriter->save('php://output');
        $htmlOutput = ob_get_clean(); // Get the output and clean the buffer

        // Set a character limit for the preview
        $limit = 800; // Set the character limit for preview
        $previewContent = '';
        $currentLength = 0;

        // Use DOMDocument to parse the HTML and limit content
        $dom = new \DOMDocument();
        @$dom->loadHTML($htmlOutput, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD); // Load HTML

        // Iterate through the paragraphs and limit the content
        $paragraphs = $dom->getElementsByTagName('p');
        foreach ($paragraphs as $paragraph) {
            if ($currentLength >= $limit) {
                $previewContent .= '...'; // Limit reached
                break;
            }
            $paragraphHtml = $dom->saveHTML($paragraph); // Append paragraph to preview content
            $previewContent .= $paragraphHtml;
            $currentLength += strlen(strip_tags($paragraphHtml)); // Update current length without HTML tags
        }

        return $previewContent; // Return the limited HTML content
    }
    protected function extractPdfContent($filePath)
    {
        $parser = new Parser();
        $pdf = $parser->parseFile($filePath);

        // Get the first page text
        $text = $pdf->getText();

        // Limit the content to the first 500 characters or any limit you prefer
        return substr($text, 0, 500) . '...';
    }
}
