<?php


if(is_Post()){

    $data = getRequest();

    if(!empty($data['user_id'] && !empty($data['course_id']))){

        $user_id = $data['user_id'];
        $course_id = $data['course_id'];

        $detailActiveCourse = getRow("SELECT id FROM active_course WHERE user_id='$user_id' AND course_id='$course_id'");
        if(!empty($detailActiveCourse)){
            $dataUpdate = [
                'status' => 1
            ];
            if(update('active_course', $dataUpdate, "user_id='$user_id' AND course_id='$course_id'")){
                setFlashData('msg', 'Kích hoạt khóa học thành công !!!');
                setFlashData('type', 'danger');
                redirect(_WEB_HOST_ROOT."/?module=course&action=detail_course&course_id=$course_id");
            }else{
                setFlashData('msg', 'Kích hoạt khóa học thất bại !!!');
                setFlashData('type', 'danger');
                redirect(_WEB_HOST_ROOT);
            }
        }
    }else{
        setFlashData('msg', 'Kích hoạt khóa học thất bại !!!');
        setFlashData('type', 'danger');
        redirect(_WEB_HOST_ROOT);
    }


}else{
    setFlashData('msg', 'Kích hoạt khóa học thất bại !!!');
    setFlashData('type', 'danger');
    redirect(_WEB_HOST_ROOT);
}










?>