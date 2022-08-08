<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'parent_id' => $this->faker->numberBetween(1,5),
            'name' => $this->faker->sentence(),
            'description' => $this->faker->text(800),
            'image' => $this->generateImage(public_path("storage/img/c"),1280, 720, uniqid()),
            'link_rewrite' => $this->faker->slug,
            'active' => $this->faker->numberBetween(0,1)
        ];
    }

        /**
     * Generador de faker imagen local
     *
     * @param string $dir
     * @param integer $width
     * @param integer $height
     * @param string $text
     * @return string
     */
    public function generateImage($path = null, $width = 640, $height = 480, $text = '')
    {

        if ( !file_exists($path) ) {
            mkdir($path, 0777, true);
        }

        header("Content-type: image/png");

        $im = imagecreate($width, $height);

        $color_bg = imagecolorallocate($im, rand(0, 255), rand(0, 255), rand(0, 255));

        $txt_color = imagecolorallocate($im, rand(0, 255), rand(0, 255), rand(0, 255));

        $text_image = $width . " X " . $height;

        $fontsize = ($width > $height) ? ($height / 10) : ($width / 10);

        imagettftext(
            $im,$fontsize, 
            0, 
            round(($width/2) - ($fontsize * 2.75)), 
            round(($height/2) + ($fontsize* 0.2)), 
            $txt_color, 
            public_path('fonts/Roboto-Regular.ttf'), 
            $text_image
        );

        $nameimage = str_replace(" ", "_", $text) . '.png';

        imagepng($im, $path . '/' . $nameimage);

        ImageDestroy($im);

        return $nameimage;
    }
}
