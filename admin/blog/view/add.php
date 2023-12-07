  <?php

$group_id = _MY_DATA['id_group'];

if(!checkPermission($group_id, 'blog', 'add')){
    redirect(_WEB_HOST_ERORR.'/permission.php');
}

    // use function PHPSTORM_META\type;

    require _WEB_PATH_ROOT . "/admin/blog/model/add.php";

    if (is_Post()) {

        $data = getRequest('post'); // $_POST vừa là $_GET

        $errors = [];

        if (empty($data['title'])) {
            $errors['title'] = 'Vui lòng nhập thông tin';
        } else {
            if (strlen($data['title']) < 5) {
                $errors['title'] = 'Dữ liệu không thể dưới 5 ký tự';
            }
        }

        if (empty($data['blog_type_id'])) {
            $errors['blog_type_id'] = 'Vui lòng chọn thông tin';
        }

        if (empty($data['content'])) {
            $errors['content'] = 'Vui lòng nhập thông tin';
        }

        if (empty($errors)) {

            $dataInsert = [
                'title' => $data['title'],
                'blog_type_id' => $data['blog_type_id'],
                'content' => $data['content'],
                'status' => 0,
                'author_id' => _MY_DATA['id'],
                'create_at' => date('Y-m-d H:i:s'),
            ];
            if (!empty($_FILES['image']['name'])) {
                $image = $_FILES['image'];  
                $nameImage = time() . '_' . $image['name'];
                $toFile =  _WEB_PATH_IMAGE_CLIENT . '/' . $nameImage;
                // chỉ xóa khi update
                // if(file_exists(_WEB_PATH_IMAGE_CLIENT.'/'.$listProducts['image'])){
                // $statuLink = unlink(_WEB_PATH_IMAGE_CLIENT.'/'.$listProducts['image']);
                // }            
                move_uploaded_file($image['tmp_name'], $toFile);
                $dataInsert['image'] = $nameImage;
            }


            if (insert('blog', $dataInsert)) {
                setFlashData('msg', 'Thêm thành công');
                setFlashData('type', 'success');
            } else {
                setFlashData('msg', 'Lỗi hệ thống');
                setFlashData('type', 'danger');
            }
        } else {
            setFlashData('msg', 'Vui lòng kiểm tra form !!!');
            setFlashData('type', 'danger');
            setFlashData('errors', $errors);
            setFlashData('old', $data);
        }
        redirect("?module=blog&action=add");
    }


    $msg = getFlashData('msg');
    $type = getFlashData('type');
    $errors = getFlashData('errors');
    $old = getFlashData('old');
    // echo '<pre>';
    // print_r($);
    // echo '</pre>';
    ?>

  <div class="container_my">

      <?php
        getAlert($msg, $type);
        ?>

      <form class="row m-0" method="post" enctype="multipart/form-data">

          <div class="form-group col-12">
              <label for="blogInputtitle">Title</label>
              <input type="title" name="title" class="form-control" id="blogInputtitle" value="<?php echo !empty($old['title']) ? $old['title'] : ''; ?>">
              <span class="text-danger"><?php echo !empty($errors['title']) ? $errors['title'] : ''; ?></span>
          </div>

          <div class="form-group col-12">
            <label for="">Ảnh</label>
            <input type="file" name="image" class="form-control"> 
            <!-- <?php echo !empty($errors['title'])?formError($errors['title']):''; ?> -->
            </div>


          <div class="form-group col-12">
              <label for="blogInputId-blog_type">Danh mục bài viết</label>
              <select class="custom-select" name="blog_type_id" id="inputGroupSelect01">
                  <option value="0">Chọn</option>
                  <?php
                    if (!empty($allBlogType)) {
                        foreach ($allBlogType as $key => $type) {
                    ?>
                          <option <?php echo (!empty($old['blog_type_id']) && $old['blog_type_id'] == $type['id']) ? 'selected' : ''; ?> value="<?php echo $type['id']; ?>"><?php echo $type['name'] . ' - ' . $type['id']; ?></option>
                  <?php
                        }
                    };
                    ?>

              </select>
              <span class="text-danger"><?php echo !empty($errors['blog_type_id']) ? $errors['blog_type_id'] : ''; ?></span>

          </div>

          <div class="form-group col-12">
              <label for="blogInputcontent">Content</label>
              <textarea class="form-control ckediter" name="content" id="blogInputcontent" rows=""><?php echo !empty($old['content']) ? $old['content'] : ''; ?></textarea>
              <span class="text-danger"><?php echo !empty($errors['content']) ? $errors['content'] : ''; ?></span>
          </div>

          <div class="form-group col-12">
              <button type="submit" class="btn btn-primary w-100">Thêm</button>
          </div>
          <br>
          <a href="?module=<?php echo $module; ?>" class="btn btn-success mb-3">Danh sách</a>


      </form>
  </div>