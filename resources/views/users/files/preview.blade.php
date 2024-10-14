<div class="container">
    <h2>Preview of {{ $file->name }}</h2>

    <!-- Display the file preview based on its type -->
    @if ($extension == 'txt')
        <!-- Text file preview -->
        <p>{{ $fileContent }}...</p>
    @elseif (in_array($extension, ['jpg', 'png', 'gif']))
        <!-- Image file preview -->
        <img src="{{ asset($fileContent) }}" alt="Image Preview" class="img-fluid" style="max-width: 600px;">
    @elseif ($extension == 'pdf')
        <!-- PDF file preview -->
        <embed src="{{ asset($fileContent) }}" type="application/pdf" width="100%" height="500px">
    @else
        <!-- For other file types -->
        <p>Preview not available for this file type.</p>
    @endif

    <a href="{{ route('file.download', $file->id) }}" class="btn btn-success mt-3">Download Full File</a>
</div>