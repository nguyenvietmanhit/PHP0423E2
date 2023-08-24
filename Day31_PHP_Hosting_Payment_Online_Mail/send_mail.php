<?php
//send_mail.php

// - Sử dụng hàm có sẵn của PHP để gửi mail:
mail('nguyenvietmanhit@gmail.com', 'Mail test',
	'Nội dung mail');
// sẽ ko gửi đc mail vì cần cấu hình XAMPP (phức tạp)
// - Trong thực tế thường dùng thư viện bên ngoài để gửi mail:
// PHPMailer
// - Sử dụng server Gmail để hỗ trợ gửi mail, bắt buộc
// phải tạo Mật khẩu ứng dụng Gmail, tham khảo
// Slides/Cách_tạo_mật_khẩu_ứng_dụng_Gmail.docx
// + Tải thư viện PHPMailer, giải nén ra
// Tạo 1 file mailer.php cùng cấp với thư mục
// PHPMailer-master vừa giải nén
?>
