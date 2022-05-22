<?php

namespace App\Traits;

trait FormattedTextGenerator {
  /**
     * Randomly generate paragraphs wrapped in <p> tag.
     *
     * @param int $pNum amount of paragraphs.
     * @param int $pLength length of paragraphs.
     * @return string
     */
    function formattedText(int $pNum, int $pLength): string
    {
        $text = '';

        for ($i = 0; $i < $pNum; $i++) {
            $text .= '<p>';
            $text .= $this->faker->realText($pLength);
            $text .= '</p>';
        }

        return $text;
    }
}