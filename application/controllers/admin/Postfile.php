<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Postfile extends CI_Controller
{
    public function tinymce_upload()
    {
        if (!empty($_FILES['gambar']['name'])) {
            $config['upload_path'] = '.upload/image/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 0;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                $this->output->set_header('HTTP/1.0 500 Server Error');
                // $out = $this->upload->display_errors();            
                exit;
            } else {
                $file = $this->upload->data();
                $this->output
                    ->set_content_type('application/json', 'utf-8')
                    ->set_output(json_encode(['location' => base_url('upload/image/') . $file['file_name']]))
                    ->_display();
                exit;
            }
        }
    }

    public function upfile()
    {
        // Allowed origins to upload images
        $accepted_origins = array("http://localhost", "http://192.168.82.130", "");

        // Images upload path
        $imageFolder = "./upload/image/";

        reset($_FILES);
        $temp = current($_FILES);
        if (is_uploaded_file($temp['tmp_name'])) {
            if (isset($_SERVER['HTTP_ORIGIN'])) {
                // Same-origin requests won't set an origin. If the origin is set, it must be valid.
                if (in_array($_SERVER['HTTP_ORIGIN'], $accepted_origins)) {
                    header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
                } else {
                    header("HTTP/1.1 403 Origin Denied");
                    return;
                }
            }

            $temp['name'] = str_replace(' ','',$temp['name']);
            $temp['name'] = str_replace('(','',$temp['name']);
            $temp['name'] = str_replace(')','',$temp['name']);

            // Sanitize input
            if (preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])) {
                header("HTTP/1.1 400 Invalid file name.");
                return;
            }

            // Verify extension
            if (!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "png"))) {
                header("HTTP/1.1 400 Invalid extension.");
                return;
            }

            // Accept upload if there was no origin, or if it is an accepted origin
            $filetowrite = $imageFolder . $temp['name'];
            move_uploaded_file($temp['tmp_name'], $filetowrite);

            $link = base_url('upload/image/'.$temp['name']);
            // Respond to the successful upload with JSON.
            echo json_encode(array('location' => $link));
        } else {
            // Notify editor that the upload failed
            header("HTTP/1.1 500 Server Error");
        }
    }
}
