<?php
require_once 'layout/header.php';
?>

<?php
require_once 'layout/menu.php';
?>

<main>
    <div class="container">
        <div>
            <div class="row ">
                <div class="col-lg-6">
                    <h3>Thông tin liên hệ</h3>
                    <p>Địa chỉ: Cổng số 1, Tòa nhà FPT Polytechnic, 13 phố Trịnh Văn Bô, phường Phương Canh, quận Nam Từ Liêm, TP Hà Nội</p>
                    <p>Điện thoại: (024) 7300 1955 </p>
                    <p>Email: caodang@fpt.edu.vn</p>
                    <p>Giờ làm việc: 8:15 – 12:00, 13:30 – 17:30</p>
                </div>
                <div class="col-lg-6">
                    <h3>Vị trí</h3>
                    <!-- Embed a Google Map here -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.863806019031!2d105.74468687379749!3d21.038134787459352!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313455e940879933%3A0xcf10b34e9f1a03df!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1717410296887!5m2!1svi!2s" width="450" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            <h3>Liên hệ với chúng tôi:</h3>
            <form action="" class="form">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Họ và tên:</label>
                    <div class="col-lg-12">
                        <input class="form-control" type="text" placeholder="Nhập họ và tên">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-12">
                        <input class="form-control" type="email" placeholder="Nhập email">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Số điện thoại:</label>
                    <div class="col-lg-12">
                        <input class="form-control" type="text" placeholder="Nhập số điện thoại">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Nội dung:</label>
                    <div class="col-lg-12">
                        <textarea class="col-lg-12" name="" id="" placeholder="Nhập nội dung"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

<?php
require_once 'layout/miniCart.php';
?>

<?php
require_once 'layout/footer.php';
?>