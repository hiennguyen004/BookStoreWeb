<style>
    /* Cấu hình chung cho body và html */
    body, html {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        min-height: 100%; /* Đảm bảo body có chiều cao tối thiểu 100% */
        display: flex;
        flex-direction: column;
		text-align: center;
    }

    /* Footer container */
    .footer {
        background-color: #f1f1f1;
        padding: 20px;
        flex-shrink: 0;  /* Đảm bảo footer không bị thu nhỏ */
        position: relative;
        bottom: 0;
        width: 100%;
    }

    

    /* Căn chỉnh các mục trong footer */
    .footer--address--tilte {
        font-size: 20px;
        font-weight: none;
        margin-bottom: 15px;
    }

    .number--footer {
        font-size: 16px;
        margin-bottom: 15px;
    }

    .moreContact a {
        display: block;
        margin: 5px 0;
        color: blue;
        font-size: 16px;
    }
 
</style>

<footer class="footer">
    <h1 class="footer--address">
        <h2 class="footer--address--tilte">
            Liên hệ với chúng tôi
        </h2>
        <h3 class="number--footer">
            <i class='bx bxs-phone'></i><b>095 832 9653</b>
            <br>
            <b>Giờ làm việc</b>: Thứ 2 -> thứ 7 từ 7:30 đến 21:00
            <br>
            <b>Địa chỉ</b>: 18 Pho Vien, P. Duc Thang, Hanoi, Vietnam
            <br>
            <b>Email</b>: tiemsach@gmail.com
        </h3>
    </h1>
    
    <div class="footer--copyright">
        Copyright 2025 © TIỆM SÁCH ONLINE
    </div>
</footer>

</body>
</html>
