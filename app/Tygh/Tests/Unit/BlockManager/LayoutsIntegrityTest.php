<?php

namespace Tygh\BlockManager;

class LayoutsIntegrityTest extends \Tygh\Tests\Unit\ATestCase
{
    /**
     * @dataProvider dpData
     */
    public function testAvailability($layout_files, $expected_hash)
    {
        $files_content = '';
        foreach ((array) $layout_files as $file_path) {
            $this->assertFileExists($file_path);

            $files_content .= file_get_contents($file_path);
        }

        $this->assertEquals(md5($files_content), $expected_hash);
    }

    public function dpData()
    {
        $path = realpath(__DIR__ . '/../../../../../') . '/';

        $responsive = $path . 'design/themes/responsive/layouts/layouts.xml';

        $bright_theme = $path . 'design/themes/bright_theme/layouts/layouts.xml';

        $ru_responsive = $path . 'var/builds/ru/files/var/themes_repository/responsive/layouts/layouts.xml';
        $ru_bright_theme = $path . 'var/builds/ru/files/var/themes_repository/bright_theme/layouts/layouts.xml';

        $booking_responsive = $path . 'var/builds/booking/files/var/themes_repository/responsive/layouts/layouts.xml';

        $nova_theme = $path . 'design/themes/nova_theme/layouts/layouts.xml';

        //WARNING: Before changing the test, add changes to all the necessary layouts!!!
        return [
            [$responsive,         '4bfa351f4da58d339d84f654887b27d0'],
            [$bright_theme,       '1bb2c00e870211cd4cf697eba19e67b7'],
            [$ru_responsive,      '45076a7bb9bf52c0feb743e27f3328cb'],
            [$ru_bright_theme,    'fe0f594d9b6f4cb77e8d1ec0fd788fea'],
            [$booking_responsive, 'cea334c9e79d5f1978b5c189e2f6f9ca'],
            [$nova_theme,         '3dcfb718c9b4eb352f820361edf13e7b'],
            [
                [
                    $responsive,
                    $bright_theme,
                    $ru_responsive,
                    $ru_bright_theme,
                    $booking_responsive,
                    $nova_theme,
                    $nova_theme,
                ],
                '69d21ac97caa4d278706eed8432a1b1d'
            ],
        ];
    }
}
