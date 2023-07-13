<!--php0423e_crud/jquery_ajax.php
- Kỹ thuật Ajax kết hợp với PHP
+ Ajax: Asynchronous Javascript And XML, là kỹ thuật tạo
ra các ứng dụng Web ko đồng bộ
+ PHP là ngôn ngữ tạo ra ứng dụng Web dạng đồng bộ: chờ chức
năng trc thực hiện xong thì mới chạy chức năng sau
Nhược điểm: chậm, ưu điểm: dễ code hơn
+ Ajax là kỹ thuật dựa trên Javascript, giúp tạo ra các ứng
dụng ko đồng bộ (đa luồng).
Không đồng bộ: cùng 1 thời điểm có thể thực thi đc nhiều
chức năng. Ưu điểm: tốc độ nhanh, nhược điểm: hơi khó học
+ Đồng bộ để hiển thị dữ liệu mới trang cần đc tải lại,
không đồng bộ ko cần tải lại trang
+ Demo Ajax với chức năng ds sp
+ Ajax nên sử dụng thư viện jQuery để thao tác cho dễ, thay
vì dùng Ajax của JS thuần
-->
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<a id="click-ajax" href="#">Click để hiển thị ds sp</a>
<div id="result">
    Ds sp sẽ đc hiển thị tại đây sau khi click
</div>
<script>
    $(document).ready(function () {
        // alert('test jquery!')
        // Khi click vào thẻ a, gọi ajax để nhờ PHP truy
        //vấn CSDL lấy ra ds sp, trả về cho nơi vừa gọi ajax
        $('#click-ajax').click(function() {
           // Tạo đối tượng JS để lưu thông tin ajax
            var obj_ajax = {
                // Url PHP sẽ xử lý ajax gửi lên
                url: 'index.php',
                // Phương thức gửi dữ liệu từ ajax lên PHP
                // GET POST PUT DELETE (theo chuẩn RestFUL API)
                method: 'GET',
                // Dữ liệu gửi lên từ ajax tới PHP
                data: {
                    fullname: 'manhnv',
                    age: 32
                },
                // Nơi nhận kết quả trả về từ PHP
                success: function(data) {
                    // Đổ kết quả trả về ra màn hình
                   $('#result').html(data);
                }
            };
            // Gọi ajax
            $.ajax(obj_ajax);
            // Cách debug ajax: Inspect -> Network, Filter by
            // Fetch/XHR
        })
    })
</script>
