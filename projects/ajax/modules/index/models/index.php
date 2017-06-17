<?php
/**
 * @filesource modules/index/models/index.php
 * @link http://www.kotchasan.com/
 * @copyright 2016 Goragod.com
 * @license http://www.kotchasan.com/license/
 */

namespace Index\Index;

use \Kotchasan\Http\Request;

/**
 * Model สำหรับรับค่าจาก Ajax
 *
 * @author Goragod Wiriya <admin@goragod.com>
 *
 * @since 1.0
 */
class Model
{

  /**
   * โหลดเว็บไซต์ด้วย Ajax
   *
   * @param Request $request
   * @return string
   */
  public function web(Request $request)
  {
    // ตรวจสอบว่าเรียกมาจากภายในไซต์
    if ($request->isReferer()) {
      // ดูค่าที่ส่งมา
      //print_r($_POST);
      // รับค่า URL ที่ส่งมา
      $url = $request->post('url')->url();
      if ($url != '') {
        // โหลด URL ที่ส่งมา
        $content = file_get_contents($url);
        // คืนค่า HTML ไปยัง Ajax
        echo $content;
      }
    }
  }

  /**
   * ส่งข้อมูลไปบันทึกด้วย Ajax
   *
   * @param Request $request
   */
  public function save(Request $request)
  {

    // ตรวจสอบว่าเรียกมาจากภายในไซต์
    if ($request->isReferer()) {
      // ดูค่าที่ส่งมา
      //print_r($_POST);
      // create Model
      $model = new \Kotchasan\Model;
      // ข้อมูลที่จะบันทึกใส่ลงใน $save
      $save = array(
        'id' => $request->post('id')->toInt(),
        'datas' => $request->post('txt')->topic()
      );
      if ($save['datas'] == '') {
        $json = array('error' => 'กรุณากรอกข้อความ');
      } else {
        // query INSERT
        $query = $model->db()->createQuery()->insert('table_name', $save);
        // ประมวลผลคำสั่ง SQL ในตอนใช้งานจริง
        //$query->execute();
        // ตัวอย่างคำสั่ง SQL ที่ได้ (ใช้ในการทดสอบ)
        $json = array('sql' => $query->text());
      }
      // คืนค่าเป็น JSON
      echo json_encode($json);
    }
  }
}