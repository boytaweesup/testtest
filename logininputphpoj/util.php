<?php

    class Util {
        public function testInput($data) {
            $data = trim($data);//ฟังก์ชัน trim() จะลบช่องว่างและอักขระที่กำหนดไว้ล่วงหน้าอื่นๆ จากทั้งสองด้านของสตริง
            $data = stripslashes($data);//ฟังก์ชัน stripslashes() จะลบเครื่องหมายแบ็กสแลช
            $data = htmlspecialchars($data);//ฟังก์ชัน htmlspecialchars() จะแปลงอักขระที่กำหนดไว้ล่วงหน้าบางตัวให้เป็นเอนทิตี HTML
            $data = strip_tags($data);//ฟังก์ชัน strip_tags() จะลบสตริงออกจากแท็ก HTML, XML และ PHP เช่น echo strip_tags("Hello <b>world!</b>");

            return $data;
        }

        public function showMessage($type, $message) {
            return '<div class="alert alert-' . $type . 'alert-dismissible fade show" role="alert">
                    <strong>' . $message . '</strong>
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close></button>
            </div>';
        }
    }


?>