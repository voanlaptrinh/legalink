<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Evaluations;
use App\Models\Introduces;
use App\Models\Members;
use App\Models\News;
use App\Models\Questions;
use App\Models\Webconfigs;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Webconfigs::truncate();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Introduces::create(attributes: [
            'name' => 'Giới thiệu',
            'description' => 'Công ty cung cấp các dịch vụ tư vấn pháp lý chuyên nghiệp cho cá nhân và doanh nghiệp trong nhiều lĩnh vực khác nhau. Làm việc với phương châm Tâm – Trí – Tín. Chúng tôi không chỉ là một công ty luật, mà còn là người bạn đồng hành đáng tin cậy trên con đường pháp lý của bạn. Cùng với đội ngũ luật sư và chuyên viên dày dặn kinh nghiệm, tâm huyết và nhiệt huyết, chúng tôi luôn nỗ lực mang đến cho khách hàng những giải pháp pháp lý hiệu quả và tối ưu nhất.',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. dapibus
            Tincidunt mollis pretium. Vivamus sodales eu sapien sitamet iaculis.
            Curabitur mollis quam dolor, quis gravida orci mattis non. Nam erat erat,
            tristique a elit at consectetur.'
        ]);

        Webconfigs::create([
            'title' => 'Luật Legalink',
            'email' => 'LegaLink@gmail.com',
            'description' => 'Công ty trách nhiệm hữu hạn luật Legalink',
            'address' => 'số X, ngõ X duy tân, Dịch Vọng
                            Hậu, Q Cầu Giấy',
            'phone' => '05683458868',
            'gg_map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d805184.6331292129!2d144.49266890254142!3d-37.97123689954809!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad646b5d2ba4df7%3A0x4045675218ccd90!2sMelbourne%20VIC%2C%20Australia!5e0!3m2!1sen!2s!4v1574408946759!5m2!1sen!2s',
            'key' => 'Luật, legalink, pháp lý, pháp chế'

        ]);
        for ($i = 0; $i < 10; $i++) {
            News::create([
                'title' => 'Tin tức legalink',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. dapibus
            Tincidunt mollis pretium.',
                'alias' => 'tin-tuc-legalink-' . $i,
            ]);
        }
        for ($i = 0; $i < 5; $i++) {
            Members::create([
                'name' => 'LegaLink',
                'description' => 'Lorem ipsum dolor sit amet',
                'content' => 'Lorem ipsum dolor sit amet',
                'email' => 'lega@example.com',
                'phone' => '098766279',
                'alias' => 'legalink-' . $i,
            ]);
        }
        for ($i = 0; $i < 10; $i++) {
            Questions::create(attributes: [
                'name' => 'Đây là câu hỏi thường gặp ?',
                'description' => 'Đây là đoạn trả lời cho câu hỏi thường gặp, nội dung
                                        câu trả lời sẽ được rút ngắn khoảng 256 ký tự, nếu xem chi tiết thì
                                        click vào câu hỏi và xem chi tiết câu trả lời,...',

            ]);
        }
        for ($i = 0; $i < 10; $i++) {
            Evaluations::create(attributes: [
                'name' => 'NGUYỄN NGỌC ĐỨC',
                'description' => 'Tôi rất hài lòng về sự tận tâm và cả sự uy tín trong quá
                                    trình tư vấn hỗ trợ doanh nghiệp tôi ở thời điểm vừa mới bắt đầu cho hành
                                    trình xây dựng thương hiệu. Legalink rất đúng chuẩn theo tiêu chị họ đưa ra
                                    " TÂM - TRÍ - TÍN"ádddddddddddđqweterwtewrtewrt',

            ]);
        }
    }
}
