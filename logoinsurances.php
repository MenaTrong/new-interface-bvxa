<?php
$logos = array(
    'daiichi.png', 'pacificcross.png', 'insmart.png', 'a+insurance.png', 
    'tokiomarine.png', 'uic.png', 'baolonginsurance.png', 'msig.png',
    'bidvmetlife.png', 'hdinsurance.png', 'BSH.png', 'manulife.png',
    'prudential.png', 'aia.png', 'fwd.png', 'hanwha.png', 'gic.png',
    'mbageas.png', 'sunlife.png', 'allianz.png', 'pti.png', 'chubb.png',
    'baominh.png', 'hungvuong.png', 'baoviet.png', 'pg.png', 'cathay.png',
    'vni.png', 'fubon.png', 'marinebenafitss.png', 'mic.png', 'sokxay.png',
    'shinhan.png', 'aaa.png', 'vbi.png', 'pvi.png'
);
?>

<div class="logo-banner">
    <div class="logos">
        <?php foreach ($logos as $logo): ?>
            <div class="logo-item">
                <img src="<?php echo get_template_directory_uri() . '/Images/baohiem/' . $logo; ?>" alt="Logo">
            </div>
        <?php endforeach; ?>
        <!-- Nhân đôi danh sách logo để tạo hiệu ứng cuộn mượt -->
        <?php foreach ($logos as $logo): ?>
            <div class="logo-item">
                <img src="<?php echo get_template_directory_uri() . '/Images/baohiem/' . $logo; ?>" alt="Logo">
            </div>
        <?php endforeach; ?>
    </div>
</div>

<style>
    .logo-banner {
        width: 100%;
        overflow: hidden;
        padding: 20px 0;
        background: #fff;
        position: relative;
        white-space: nowrap;
    }

    .logos {
        display: flex;
        width: max-content; /* Đảm bảo phần tử mở rộng theo nội dung */
        animation: scroll-left 50s linear infinite;
    }

    .logo-item {
        padding: 0 20px; /* Điều chỉnh khoảng cách giữa các logo */
    }

    .logo-item img {
        width: 100px; /* Điều chỉnh kích thước */
        height: auto;
    }

    @keyframes scroll-left {
        from {
            transform: translateX(0);
        }
        to {
            transform: translateX(-50%); /* Cuộn một nửa danh sách, phần còn lại tiếp nối */
        }
    }
</style>
