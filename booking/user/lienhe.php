
    <title>Liên Hệ</title>
<?php include('header.php'); ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <strong>LIÊN HỆ VỚI CHÚNG TÔI</strong>
                </div>
                <div class="card-body">
                    <form action="addlienhecontroller.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="tenkhach" placeholder="Tên của bạn" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Email của bạn" required>
                        </div>
                        <div class="mb-3">
                            <select class="form-select" name="loai_phanhoi" id="loai_phanhoi" required>
                                <option value="Đặt phòng">Đặt phòng</option>
                                <option value="Dịch vụ">Dịch vụ</option>
                                <option value="Thông tin">Thông tin</option>
                                <option value="Vấn đề khác">Vấn đề khác</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" name="noidung_phanhoi" id="noidung_phanhoi" placeholder="Tin nhắn" rows="5" required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" name="Gửi tin nhắn">Gửi tin nhắn</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <strong>Liên lạc</strong>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <i class="bi bi-geo-alt"></i> <a>2 P. Thái Hà, Str, Wd, Hà Nội</a>
                    </div>
                    <div class="mb-3">
                        <i class="bi bi-phone"></i> <a>024 3857 5588</a>
                    </div>
                    <div class="mb-3">
                        <i class="bi bi-phone"></i> <a>+84 5847 5847</a>
                    </div>
                    <div class="mb-3">
                        <i class="bi bi-envelope"></i> <a>info@novotelthaiha.com</a>
                    </div>
                    <div class="mb-3">
                        <i class="bi bi-globe"></i> <a>novotelthaiha.com</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.56937808395!2d105.82144807530052!3d21.009891980634745!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ad8a205928b5%3A0x46e77ee250af2fa8!2sNovotel%20Hanoi%20Thai%20Ha!5e0!3m2!1svi!2s!4v1701079460175!5m2!1svi!2s"
        width="100%" height="500px" style="border-radius: 10px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

<?php include('./footer.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
</script>

</body>
</html>
