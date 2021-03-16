<?php require_once $_SERVER["DOCUMENT_ROOT"].'/templates/public/inc/header.php';?>
  <!-- BEGIN body -->
  <div id="body">
    <!-- BEGIN content -->
    <div id="content">
      <!-- begin post -->
      <div class="single">
        <h2>Contact</h2>
        <div class="break"></div>
          <p>Hãy liên lạc với chúng tôi</p>
      </div>
      <!-- end post -->
      <div id="comments">
        <div id="respond">
          <h2>Leave a Reply</h2>
          <div class="break"></div>

          <form method="post" id="indexAdd">
            <p>
              <input type="text" name="author" id="author" value="" size="22" tabindex="1" />
              <label for="author"><small>Name (required)</small></label>
            </p>
            <p>
              <input type="text" name="email" id="email" value="" size="22" tabindex="2" />
              <label for="email"><small>Mail (required)</small></label>
            </p>
            <p>
              <input type="text" name="phone" id="phone" value="" size="22" tabindex="3" />
              <label for="url"><small>Phone</small></label>
            </p>
            <p>
              <textarea class="ckeditor" name="tinnhan" id="tinnhan" cols="100%" rows="10" tabindex="4"></textarea>
            </p>
            <p>
              <button name="submit" type="submit" id="submit">Submit</button>
                <span id="span" style="color: red"></span>
            </p>
          </form>
            <?php
            if($_SERVER["REQUEST_METHOD"]=="POST")
            {
                $tendangnhap=$_POST["author"];
                $dienthoai=$_POST["phone"];
                $email=$_POST["email"];
                $tinnhan=$_POST["tinnhan"];

                if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
                    echo "<script>$('#span').text('Email khong hop le');</script>";
                }
                if ($tendangnhap=='')
                {
                    echo "<script>$('#span').text('tên khong hop le');</script>";
                }
                else {


                    $themNguoiDung="INSERT INTO contact(name, email, phone, content)  VALUES('".$tendangnhap."','".$email."','".$dienthoai."','".$tinnhan."')";

                    $chay=$mysqli->query($themNguoiDung);
                    if($chay)
                        echo "<script>$('#span').text('Gởi thành công');</script>";
                }
            }

            ?>
        </div>
      </div>
    </div>
      <script>
          $( document ).ready( function () {

              $( "#indexAdd" ).validate( {
                  ignore: [],
                  debug: false,
                  rules: {
                      author: {
                          required: true,
                          minlength: 5,
                          maxlength: 100,
                      },
                      tinnhan: {
                          required: function(){
                              CKEDITOR.instances.tinnhan.updateElement();
                          },
                          minlength: 5,
                      },
                      phone:{
                          required: true,
                          number: true
                      },
                      email:{
                          required: true,
                          email: true
                      }
                  },
                  messages: {
                      author: {
                          required: "Vui lòng nhập vào đây",
                          minlength: "Vui lòng nhập tối thiểu 5 ký tự",
                          maxlength: "Vui lòng nhập tối đa 100 ký tự",
                      },
                      tinnhan: {
                          required: "Vui lòng nhập vào đây",
                          minlength: "Vui lòng nhập tối thiểu 5 ký tự",
                      },
                      phone:{
                          required: "Vui lòng nhập vào đây",
                          number: "nhập sdt nhé",
                      },
                      email:{
                          required: "Vui lòng nhập vào đây",
                          email: "nhập sdt nhé",
                      }
                  },
              });
          });
      </script>
    <!-- END content -->
      <?php require_once $_SERVER["DOCUMENT_ROOT"].'/templates/public/inc/left_bar.php';?>
  </div>
<!-- END body -->
<!-- BEGIN footer -->
<?php require_once $_SERVER["DOCUMENT_ROOT"].'/templates/public/inc/footer.php';?>
