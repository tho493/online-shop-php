-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th12 22, 2023 lúc 09:37 AM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `online-shop`
--

DELIMITER $$
--
-- Thủ tục
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getcat` (IN `cid` INT)   SELECT * FROM categories WHERE cat_id=cid$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_info`
--

CREATE TABLE `admin_info` (
  `admin_id` int NOT NULL,
  `admin_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `admin_email` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `admin_password` varchar(300) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_info`
--

INSERT INTO `admin_info` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'admin', 'admin@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `brand_id` int NOT NULL,
  `brand_title` mediumtext COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Oppo'),
(2, 'Samsung'),
(3, 'Apple'),
(4, 'LG'),
(5, 'Hàng trung quốc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `p_id` int NOT NULL,
  `ip_add` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int DEFAULT NULL,
  `qty` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `ip_add`, `user_id`, `qty`) VALUES
(169, 3, '127.0.0.1', -1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `cat_id` int NOT NULL,
  `cat_title` mediumtext COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Thiết bị điện tử'),
(2, 'Giày dép'),
(3, 'Đồ gia dụng'),
(4, 'Thời trang');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders_info`
--

CREATE TABLE `orders_info` (
  `order_id` int NOT NULL,
  `user_id` int NOT NULL,
  `f_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `zip` int NOT NULL,
  `cardname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `cardnumber` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `expdate` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `prod_count` int DEFAULT NULL,
  `total_amt` int DEFAULT NULL,
  `cvv` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders_info`
--

INSERT INTO `orders_info` (`order_id`, `user_id`, `f_name`, `email`, `address`, `city`, `state`, `zip`, `cardname`, `cardnumber`, `expdate`, `prod_count`, `total_amt`, `cvv`) VALUES
(1, 1, 'Nguyễn Chí Thọ', 'chitho040903@gmail.com', '64 ngọc nữ', 'Thành phố Thanh Hóa', 'Thanh Hóa', 400000, 'thi', '1241553626', '12/25', 2, 7250, 123),
(2, 1, 'Nguyễn Chí Thọ', 'chitho040903@gmail.com', '64 ngọc nữ', 'Thành phố Thanh Hóa', 'Thanh Hóa', 400000, 'tho', '1232142144', '12/25', 1, 3800, 123);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_products`
--

CREATE TABLE `order_products` (
  `order_pro_id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `qty` int DEFAULT NULL,
  `amt` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_products`
--

INSERT INTO `order_products` (`order_pro_id`, `order_id`, `product_id`, `qty`, `amt`) VALUES
(100, 1, 1, 1, 3450),
(101, 1, 2, 1, 3800),
(102, 2, 2, 1, 3800);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int NOT NULL,
  `product_cat` int NOT NULL,
  `product_brand` int NOT NULL,
  `product_title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `product_price` int NOT NULL,
  `product_desc` mediumtext COLLATE utf8mb4_general_ci NOT NULL,
  `product_details` varchar(10000) COLLATE utf8mb4_general_ci NOT NULL,
  `product_image` mediumtext COLLATE utf8mb4_general_ci NOT NULL,
  `product_keywords` mediumtext COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_details`, `product_image`, `product_keywords`) VALUES
(1, 1, 3, 'IPhone 15 Pro Max', 3450, 'Điện thoại Apple iPhone 15 Pro Max', 'Thông số kỹ thuật\r\n<br>\r\n- 6.7″\r\n<br>\r\n- Màn hình Super Retina XDR\r\n<br>\r\n- Màn hình Luôn Bật\r\n<br>\r\n- Công nghệ ProMotion\r\n<br>\r\n- Titan với mặt sau bằng kính nhám\r\n<br>\r\n- Nút Tác Vụ\r\n<br>\r\n- Dynamic Island\r\n<br>\r\n- Chip A17 Pro với GPU 6 lõi\r\n<br>\r\n- SOS Khẩn Cấp \r\n<br>\r\n- Phát Hiện Va Chạm\r\n<br>\r\n- Pin: Thời gian xem video lên đến 29 giờ\r\n<br>\r\n- USB‑C: Hỗ trợ USB 3 cho tốc độ truyền tải nhanh hơn đến 20x\r\n<br>\r\n<br>\r\n<br>\r\nCamera sau\r\n<br>\r\n- Chính 48MP | Ultra Wide | Telephoto\r\n<br>\r\n- Ảnh có độ phân giải siêu cao (24MP và 48MP)\r\n<br>\r\n- Ảnh chân dung thế hệ mới với Focus và Depth Control\r\n<br>\r\n- Phạm vi thu phóng quang học lên đến 10x\r\n<br>\r\n<br>\r\n<br>\r\nBộ sản phẩm bao gồm: \r\n<br>\r\n•        Điện thoại \r\n<br>\r\n•        Dây sạc\r\n<br>\r\n•        HDSD Bảo hành điện tử 12 tháng.\r\n<br>\r\n<br>\r\n<br>\r\nThông tin bảo hành:\r\n<br>\r\nBảo hành: 12 tháng kể từ ngày kích hoạt sản phẩm.\r\n<br>\r\nKích hoạt bảo hành tại: https://checkcoverage.apple.com/vn/en/', 'iphone-15-pro-max.jpg', 'apple'),
(2, 1, 3, 'Iphone 14 pro max', 3800, 'Điện thoại iphone 14 pro max', 'iPhone 14 Pro Max. Bắt trọn chi tiết ấn tượng với Camera Chính 48MP. Trải nghiệm iPhone theo cách hoàn toàn mới với Dynamic Island và màn hình Luôn Bật. Công nghệ an toàn quan trọng – Phát Hiện Va Chạm  thay bạn gọi trợ giúp khi cần kíp\r\n<br>\r\n<br>\r\n<br>\r\nTính năng nổi bật\r\n<br>\r\nMàn hình Super Retina XDR 6,7 inch2 với tính năng Luôn Bật và ProMotion\r\n<br>\r\nDynamic Island, một cách mới tuyệt diệu để tương tác với iPhone\r\n<br>\r\nCamera Chính 48MP cho độ phân giải gấp 4 lần\r\n<br>\r\nChế độ Điện Ảnh nay đã hỗ trợ 4K Dolby Vision tốc độ lên đến 30 fps\r\n<br>\r\nChế độ Hành Động để quay video cầm tay mượt mà, ổn định\r\n<br>\r\nCông nghệ an toàn quan trọng – Phát Hiện Va Chạm1 thay bạn gọi trợ giúp khi cần kíp\r\n<br>\r\nThời lượng pin cả ngày và thời gian xem video lên đến 29 giờ3\r\n<br>\r\nA16 Bionic, chip điện thoại thông minh tuyệt đỉnh. Mạng di động 5G siêu nhanh4\r\n<br>\r\nCác tính năng về độ bền dẫn đầu như Ceramic Shield và khả năng chống nước5\r\n<br>\r\niOS 16 đem đến thêm nhiều cách để cá nhân hóa, giao tiếp và chia sẻ6\r\n<br>\r\n<br>\r\n<br>\r\nPháp lý\r\n<br>\r\n1SOS Khẩn Cấp sử dụng kết nối mạng di động hoặc Cuộc Gọi Wi-Fi.\r\n<br>\r\n2Màn hình có các góc bo tròn. Khi tính theo hình chữ nhật, kích thước màn hình theo đường chéo là 6,69 inch. Diện tích hiển thị thực tế nhỏ hơn.\r\n<br>\r\n3Thời lượng pin khác nhau tùy theo cách sử dụng và cấu hình; truy cập apple.com/batteries để biết thêm thông tin.\r\n<br>\r\n4Cần có gói cước dữ liệu. Mạng 5G chỉ khả dụng ở một số thị trường và được cung cấp qua một số nhà mạng. Tốc độ có thể thay đổi tùy địa điểm và nhà mạng. Để biết thông tin về hỗ trợ mạng 5G, vui lòng liên hệ nhà mạng và truy cập apple.com/iphone/cellular.\r\n<br>\r\n5iPhone 14 Pro Max có khả năng chống tia nước, chống nước và chống bụi. Sản phẩm đã qua kiểm nghiệm trong điều kiện phòng thí nghiệm có kiểm soát đạt mức IP68 theo tiêu chuẩn IEC 60529 (chống nước ở độ sâu tối đa 6 mét trong vòng tối đa 30 phút). Khả năng chống tia nước, chống nước và chống bụi không phải là các điều kiện vĩnh viễn. Khả năng này có thể giảm do hao mòn thông thường. Không sạc pin khi iPhone đang bị ướt.\r\n<br>\r\nVui lòng tham khảo hướng dẫn sử dụng để biết cách lau sạch và làm khô máy. Không bảo hành sản phẩm bị hỏng do thấm chất lỏng.\r\n<br>\r\n6Một số tính năng không khả dụng tại một số quốc gia hoặc khu vực.', 'iphone-14-pro-max.jpg', 'apple'),
(3, 1, 3, 'Iphone 15', 3000, 'Điện thoại iphone 15', 'Thông số kỹ thuật\r\n<br>\r\n- 6.1″\r\n<br>\r\n- Màn hình Super Retina XDR\r\n<br>\r\n- Nhôm với mặt sau bằng kính pha màu\r\n<br>\r\n- Nút chuyển đổi Chuông/Im Lặng\r\n<br>\r\n- Dynamic Island\r\n<br>\r\n- Chip A16 Bionic với GPU 5 lõi\r\n<br>\r\n- SOS Khẩn Cấp \r\n<br>\r\n- Phát Hiện Va Chạm\r\n<br>\r\n- Pin: Thời gian xem video lên đến 26 giờ\r\n<br>\r\n- USB‑C: Hỗ trợ USB 2\r\n<br>\r\n<br>\r\n<br>\r\nCamera sau\r\n<br>\r\n- Chính 48MP | Ultra Wide\r\n<br>\r\n- Ảnh có độ phân giải siêu cao (24MP và 48MP)\r\n<br>\r\n- Ảnh chân dung thế hệ mới với Focus và Depth Control\r\n<br>\r\n- Phạm vi thu phóng quang học 4x\r\n<br>\r\n<br>\r\n<br>\r\nBộ sản phẩm bao gồm: \r\n<br>\r\n•        Điện thoại \r\n<br>\r\n•        Dây sạc\r\n<br>\r\n•        HDSD Bảo hành điện tử 12 tháng.\r\n<br>\r\n<br>\r\n<br>\r\nThông tin bảo hành:\r\n<br>\r\nBảo hành: 12 tháng kể từ ngày kích hoạt sản phẩm.\r\n<br>\r\nKích hoạt bảo hành tại: https://checkcoverage.apple.com/vn/en/', 'iphone-15.jpg', 'apple'),
(4, 1, 3, 'Iphone 15 Plus', 3000, 'Điện thoại Iphone 15 plus', 'Thông số kỹ thuật\r\n<br>\r\n- 6.7″\r\n<br>\r\n- Màn hình Super Retina XDR\r\n<br>\r\n- Nhôm với mặt sau bằng kính pha màu\r\n<br>\r\n- Nút chuyển đổi Chuông/Im Lặng\r\n<br>\r\n- Dynamic Island\r\n<br>\r\n- Chip A16 Bionic với GPU 5 lõi\r\n<br>\r\n- SOS Khẩn Cấp \r\n<br>\r\n- Phát Hiện Va Chạm\r\n<br>\r\n- Pin: Thời gian xem video lên đến 26 giờ\r\n<br>\r\n- USB‑C: Hỗ trợ USB 2\r\n<br>\r\n<br>\r\n<br>\r\nCamera sau\r\n<br>\r\n- Chính 48MP | Ultra Wide\r\n<br>\r\n- Ảnh có độ phân giải siêu cao (24MP và 48MP)\r\n<br>\r\n- Ảnh chân dung thế hệ mới với Focus và Depth Control\r\n<br>\r\n- Phạm vi thu phóng quang học 4x\r\n<br>\r\n<br>\r\n<br>\r\nBộ sản phẩm bao gồm: \r\n<br>\r\n•        Điện thoại \r\n<br>\r\n•        Dây sạc\r\n<br>\r\n•        HDSD Bảo hành điện tử 12 tháng.', 'iphone-15-plus.jpg', 'apple'),
(5, 1, 3, 'Iphone 14 ', 2500, 'Điện thoại Iphone 14', 'iPhone 14. Với hệ thống camera kép tiên tiến nhất từng có trên iPhone. Chụp những bức ảnh tuyệt đẹp trong điều kiện từ thiếu sáng đến dư sáng. Phát hiện Va Chạm,1 một tính năng an toàn mới, thay bạn gọi trợ giúp khi cần kíp.<br>\r\nTính năng nổi bật<br>\r\n•        Màn hình Super Retina XDR 6,1 inch2<br>\r\n•        Hệ thống camera tiên tiến cho chất lượng ảnh đẹp hơn trong mọi điều kiện ánh sáng<br>\r\n•        Chế độ Điện Ảnh nay đã hỗ trợ 4K Dolby Vision tốc độ lên đến 30 fps<br>\r\n•        Chế độ Hành Động để quay video cầm tay mượt mà, ổn định<br>\r\n•        Công nghệ an toàn quan trọng - Phát Hiện Va Chạm1 thay bạn gọi trợ giúp khi cần kíp<br>\r\n•        Thời lượng pin cả ngày và thời gian xem video lên đến 20 giờ3<br>\r\n•        Chip A15 Bionic với GPU 5 lõi để đạt hiệu suất siêu nhanh. Mạng di động 5G siêu nhanh4<br>\r\n•        Các tính năng về độ bền dẫn đầu như Ceramic Shield và khả năng chống nước5<br>\r\n•        iOS 16 đem đến thêm nhiều cách để cá nhân hóa, giao tiếp và chia sẻ6', 'iphone-14.jpg', 'apple'),
(6, 1, 3, 'Iphone 13', 2000, 'Điện thoại iphone 13', 'iPhone 13<br>\r\nHệ thống camera kép tiên tiến nhất từng có trên iPhone. Chip A15 Bionic thần tốc. Bước nhảy vọt về thời lượng pin. Thiết kế bền bỉ. Mạng 5G siêu nhanh.1 Cùng với màn hình Super Retina XDR sáng hơn.\r\n<br>Tính năng nổi bật\r\n<br>\r\n• Màn hình Super Retina XDR 6.1 inch2\r\n<br>\r\n• Chế độ Điện Ảnh làm tăng thêm độ sâu trường ảnh nông và tự động thay đổi tiêu cự trong video\r\n<br>\r\n• Hệ thống camera kép tiên tiến với camera Wide và Ultra Wide 12MP; Phong Cách Nhiếp Ảnh, HDR thông minh thế hệ 4, chế độ Ban Đêm, khả năng quay video HDR Dolby Vision 4K\r\n<br>\r\n• Camera trước TrueDepth 12MP với chế độ Ban Đêm và khả năng quay video HDR Dolby Vision 4K\r\n<br>\r\n• Chip A15 Bionic cho hiệu năng thần tốc\r\n<br>\r\n• Thời gian xem video lên đến 19 giờ3\r\n<br>\r\n• Thiết kế bền bỉ với Ceramic Shield\r\n<br>\r\n• Khả năng chống nước đạt chuẩn IP68 đứng đầu thị trường4\r\n<br>\r\n• Mạng 5G cho tốc độ tải xuống siêu nhanh, xem video và nghe nhạc trực tuyến chất lượng cao1\r\n<br>\r\n• iOS 15 tích hợp nhiều tính năng mới cho phép bạn làm được nhiều việc hơn bao giờ hết với iPhone5', 'iphone-13.jpg', 'apple'),
(7, 1, 2, 'Samsung Z-Fold 4', 3000, 'Điện thoại Samsung Z-Fold 4', 'Bảo hành chính hãng 12 tháng\r\n<br>\r\nTrung tâm bảo hành vui lòng tham khảo đường link: https://www.samsung.com/vn/support/service-center/Hotline: 1800-588-855', 'z-fold-4.jpg', 'samsung'),
(8, 1, 2, 'Samsung Galaxy S23 Ultra', 4500, 'Điện thoại Samsung Galaxy S23 Ultra', '✔️ Công nghệ màn hình: Dynamic AMOLED 2X\r\n<br>\r\n✔️ Độ phân giải: 2K+ (1440 x 3088 Pixels)\r\n<br>\r\n✔️ Camera sau: Chính 200 MP & Phụ 12 MP, 10 MP, 10 MP\r\n<br>\r\n✔️ Camera trước: 12 MP\r\n<br>\r\n✔️ Hệ điều hành: Android 13\r\n<br>\r\n✔️ Tốc độ CPU: 1 nhân 3.36 GHz, 4 nhân 2.8 GHz & 3 nhân 2 GHz\r\n<br>\r\n✔️ Chất liệu: Khung nhôm & Mặt lưng kính cường lực\r\n<br>\r\n✔️ Bảo mật nâng cao: Mở khoá vân tay dưới màn hình\r\n<br>\r\n✔️ Tính năng đặc biệt: Màn hình luôn hiển thị AOD, Âm thanh Dolby Atmos\r\n<br>\r\n✔️ Bộ sản phẩm gồm: Hộp, Sách hướng dẫn, Bút cảm ứng, Cây lấy sim, Cáp Type C\r\n<br>\r\n✔️ Thông tin bảo hành: Bảo hành 12 tháng tại các trung tâm bảo hành của Samsung trên toàn quốc\r\n<br>\r\n✔️ Sản phẩm đã được kích hoạt bảo hành điện tử\r\n<br>\r\n🔴 Chiếc flagship Samsung Galaxy S23 Ultra 5G  trình làng với màn hình có kích thước lớn - 6.8 inch phục vụ tệp khách hàng có nhu cầu quan trọng về cấu hình màn hình khi mua điện thoại. Đi đôi với kích thước 6.8 inch là tấm nền Dynamic AMOLED 2X, công nghệ LTPO 2.0 với độ phân giải 1-120Hz tự động điều chỉnh theo ánh sáng giúp tiết kiệm pin hơn cũng như bảo vệ đôi mắt của bạn trong mọi điều kiện ánh sáng. \r\n<br>\r\n🔴 Thông số mới của Samsung Galaxy S23 Ultra 5G khiến cho những người đam mê công nghệ phải “mồm chữ O mới chữ A” vì độ phân giải chính đã nâng cấp lên 200MP. Thật sự Samsung đã quyết tâm đánh dấu sự tiến bộ vượt bậc trong cấu tạo của các ống kính chụp ảnh, quay phim chuyên nghiệp hơn cho khách hàng của mình.\r\n<br>\r\n🔴 Galaxy S23 Ultra 5G sẽ hoạt động dựa trên sức mạnh “khủng khiếp” chưa từng có một lần nữa đến từ nhà chuyên sản xuất bộ vi xử lý cho các dòng smartphone cao cấp - Qualcomm. Chipset mang tên Snapdragon 8 Gen 2. Nâng cấp mới mẻ về hiệu năng chung để thiết bị đáp ứng mọi nhu cầu công việc, giải trí của bạn.\r\n<br>\r\n🔴 Cuối cùng không thể bỏ qua là dung lượng pin của máy, Samsung Galaxy S23 Ultra 5G  tích hợp viên pin 5000mAh đi kèm hỗ trợ sạc nhanh, sạc ngược, sạc không dây rất nhanh chóng giảm thiểu tình trạng gián đoạn công việc do máy liên tục hết pin và phải dừng lại sạc.', 'galaxy-s23.jpg', 'samsung'),
(9, 1, 2, 'Samsung Galaxy S23+', 3400, 'Điện thoại Samsung Galaxy S23+', 'Màn hình: Infinity-O, 19.5:9, 6.6”, FHD+, (2.340 x 1.080) Dynamic AMOLED 2X (48~120Hz)\r\n<br>\r\nVi xử lý: Snapdragon 8 Gen 2 – 4nm 8 nhân (3.2GHz)\r\n<br>\r\nBộ nhớ: RAM: 8GB, ROM: 256GB/512GB, Không hỗ trợ thẻ nhớ\r\n<br>\r\nPin và sạc: 4,700mAh, Sạc siêu nhanh 2.0 45W, Chia sẻ pin không dây\r\n<br>\r\nKích thước: 157.8 x 76.2 x 7.6 mm\r\n<br>\r\nTrọng lượng: 195g\r\n<br>\r\nSản phẩm bao gồm: Điện Thoại, Dây Cáp, Không bao gồm cốc sạc\r\n<br>\r\n<br>\r\nBảo hành 12 tháng tại trung tâm bảo hành chính hãn Samsung. Xem danh sách tại https://www.samsung.com/vn/support/supportServiceCenter/', 'galaxy-s23-plus.jpg', 'samsung'),
(10, 1, 4, 'LG Velvet 5G', 3500, 'Điện thoại LG Velvet 5G', 'Màn hình:  P-OLED, tỷ lệ 20.5:96.8 inches, Full HD+ (1080 x 2460 pixels)<br>\r\nHệ điều hành: Android 10, được nâng lên Android 11, LG UX 10<br>\r\nCó thể được lên Android 13 (chỉ bản 5G)<br>\r\nCamera sau: 48 MP, f/1.8, 26mm (góc rộng), PDAF<br>\r\n8 MP, f/2.2, 120˚, 15mm (góc siêu rộng)<br>\r\n5 MP, f/2.4 (độ sâu)<br>\r\nQuay phim: 4K@30fps, 1080p@30/60fps, gyro-EIS<br>\r\nCamera trước: 16 MP, f/1.9, 29mm (tiêu chuẩn)<br>\r\nQuay phim: Bản 5G: 1080p@30fps<br>\r\nCPU: Bản 5G: SM7250 Snapdragon 765G 5G (7 nm)<br>\r\n8 nhân (1x2.4 GHz & 1x2.2 GHz & 6x1.8 GHz)<br>\r\nGPU: Adreno 620<br>\r\nRAM: 8GB<br>\r\nBộ nhớ trong: 128GB<br>\r\nThẻ SIM: 1 + thẻ nhớ, hoặc 2 SIM<br>\r\nDung lượng pin: Li-Po 4300mAh<br>\r\nSạc nhanh 25W PD3.0, QC4 (bản 5G)<br>\r\nSạc nhanh không dây 9W<br>\r\nThiết kế: Khung nhôm, 2 mặt kính<br>\r\nHỗ trợ IP68', '1700730190_lg-velvet-5g.jpg', 'lg'),
(11, 1, 4, 'LG G7 plus ThinQ', 1000, 'Điện thoại LG G7 plus ThinQ', 'Màn hình mặt kính cảm ứng:\r\nCorning Gorilla Glass 5<br>\r\nĐộ phân giải:\r\n2K+ (1440 x 2960 Pixels)<br>\r\nCông nghệ màn hình:\r\nIPS LCD<br>\r\nMàn hình rộng:\r\n6.01 inch<br>\r\nCamera sau\r\n2 camera 16 MP<br>\r\nĐèn Flash:\r\nCó<br>\r\nChụp ảnh nâng cao:\r\nTự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, HDR, Panorama, Beautify<br>\r\nQuay Phim:\r\n2160p@30fps, 1080p@30/60fps, HDR, 24-bit/192kHz stereo sound rec.<br><br>\r\nCamera trước\r\nThông tin khác:\r\nChụp phơi sáng, Chụp ảnh xóa phông, Chụp trước lấy nét sau, Tự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, HDR, Panorama, Chống rung quang học (OIS), Chế độ chụp chuyên nghiệp<br>\r\nVideo Call:\r\nHỗ trợ VideoCall thông qua ứng dụng<br>\r\nCamera trước:\r\n5 MP<br><br>\r\nHệ điều hành - CPU\r\nChipset:\r\nSnapdragon 845 8 nhân<br>\r\nHệ điều hành:\r\nAndroid 8.1 (Oreo)<br>\r\nTốc độ CPU:\r\nOcta-core (4x2.8 GHz Kryo 385 Gold &amp; 4x1.7 GHz Kryo 385 Silver)<br>\r\nChip đồ họa (GPU):\r\nAdreno 630<br><br>\r\nBộ nhớ & Lưu trữ\r\nRAM:\r\n6 GB<br>\r\nBộ nhớ trong ( Rom):\r\n128 GB<br>\r\nThẻ nhớ ngoài:\r\nMicroSD<br>', '1700730619_lg-g7-thinq.jpg', 'lg'),
(12, 1, 1, 'Oppo Reno 8T 5G', 15000, 'Điện thoại Oppo Reno 8T 5G', '✔️ Công nghệ màn hình: AMOLED<br>\r\n✔️ Độ phân giải: Full HD+ (1080 x 2412 Pixels)<br>\r\n✔️ Camera sau: Chính 108 MP & Phụ 2 MP, 2 MP<br>\r\n✔️ Camera trước: 32 MP<br>\r\n✔️ Hệ điều hành: Android 13<br>\r\n✔️ Tốc độ CPU: 2.2 GHz<br>\r\n✔️ Bảo mật nâng cao: Mở khoá vân tay dưới màn hình<br>\r\n✔️ Tính năng đặc biệt: Chế độ đơn giản (Giao diện đơn giản), Cử chỉ thông minh, Ứng dụng kép (Nhân bản ứng dụng), Chế độ trẻ em (Không gian trẻ em), Đa cửa sổ (chia đôi màn hình), Cử chỉ màn hình tắt, Mở rộng bộ nhớ RAM<br>\r\n✔️ Chất liệu: Khung hợp kim & Mặt lưng thuỷ tinh hữu cơ<br>\r\n✔️ Bộ sản phẩm gồm: Hộp, Sách hướng dẫn, Cây lấy sim, Cáp Type C, Củ sạc Type C, Ốp lưng<br>\r\n✔️ Thông tin bảo hành: Bảo hành 12 tháng tại các trung tâm bảo hành của Oppo trên toàn quốc<br>\r\n✔️ Sản phẩm đã được kích hoạt bảo hành điện tử<br>\r\n🔴 OPPO sẽ sử dụng tấm nền AMOLED dành cho Reno8 T 5G, vì thế nội dung hiển thị sẽ có màu sắc bắt mắt, hình ảnh có chiều sâu cùng với khả năng tối ưu điện năng cực tốt để cho ra thời gian sử dụng lâu dài. Kèm với đó sẽ là màn hình có tần số quét 120 Hz và độ sáng tối đa 800 nits để mang lại khả năng vuốt chạm mượt mà và hiển thị nội dung rõ ràng kể cả ở ngoài trời.', '1700731238_reno-8t-5g.jpg', 'oppo'),
(14, 1, 1, 'OPPO A92', 200, 'Điện thoại OPPO A92', 'Thông số cơ bản của máy :<br>\r\n<br>\r\nMàn hình: TFT LCD, 6.5\", Full HD+<br>\r\nHệ điều hành: Android 10<br>\r\nCamera sau: Chính 48 MP & Phụ 8 MP, 2 MP, 2 MP<br>\r\nCamera trước: 16 MP<br>\r\nCPU: Snapdragon 665 8 nhân<br>\r\nRAM: 8 GB<br>\r\nBộ nhớ trong: 128 GB<br>\r\nThẻ nhớ: MicroSD, hỗ trợ tối đa 256 GB<br>\r\nThẻ SIM:<br>\r\n2 Nano SIM, Hỗ trợ 4G<br>\r\nDung lượng pin: 5000 mAh', '1701394514_vn-11134201-23030-jtq9u9g25fov11.jpg', 'oppo'),
(15, 1, 1, 'OPPO Reno 9 Pro+', 1235, 'Điện thoại OPPO Reno 9 Pro+', 'Oppo Reno 9 Pro + 5G (Phiên bản tiếng Trung)<br>\r\n> Tên Model --- PGW110<br>\r\n> Kích thước --- 161,5 * 73,6 * 7,99mm, Trọng lượng Xấp xỉ. 192g (bao gồm cả pin)<br>\r\n> Ram + ROM --- RAM LPDDR5 16GB + ROM 1256GB / 512GB UFS3.1<br>\r\n> Màn hình --- 6,7 inch AMOLED; 100% DCI-P3<br>\r\n> Tỷ lệ màn hình --- 93%, 394 PPI<br>\r\n> Độ phân giải màn hình --- 1080 ” 2412 (FHD +)<br>\r\n> Máy ảnh --- Camera trước: Máy ảnh Selfie 32MP (F / 2.4); FOV 90°<br>\r\n> Máy ảnh --- Camera sau: Máy ảnh 50MP chính (f / 1.8; FOV 86°; 6p) + Máy ảnh góc siêu rộng 8MP (f / 2.2; FOV 112°; Máy ảnh Macro 5P) + 2MP (f / 2.4, FOV 89°; 3p + IR)<br>\r\n> Cpu --- Lõi Ocat Snapdragon 8 + Thế hệ 1,<br>\r\n> Gpu --- Qualcomm® Quảng cáo™ Gpu<br>\r\n> Pin --- 4700mAh (điển hình) / 4580mAh (tối thiểu), 80W SuperCharge; SuperCharge; SuperCharge 2.0 “SuperVOOC ” VOOC 3.0 ” PD (9V / 2A) ” QC3.0 (9V / 2A<br>\r\n> Khác --- Wi-Fi 6 (802.11ax) “Wi-Fi 5 (802.11ac) ” 802.11a / b / g / n /; 2 ” 2 MIMO; 8 Âm thanh luồng không gian MU-MI; NFC<br>\r\n> Hệ điều hành --- ColorOS 13 Dựa trên Android 13.0; có Cập nhật đa ngôn ngữ & OTA và cửa hàng Google play và có một số ứng dụng tiếng Trung mà bạn không thể xóa<br>\r\n> Mạng---- Toàn bộ Netcom, Chế độ chờ kép hai SIM<br>\r\n<br>\r\n4g LTE TDD: Băng tần 34 / 38 / 39 / 40 / 41<br>\r\n5g NR: n1 / n5 / n8 / n28A / n41 / n77 / n78<br>\r\n<br>\r\nTrong hộp: Điện thoại * 1, Bộ sạc nguồn * 1, Cáp loại C * 1, Vỏ * 1, Dụng cụ thẻ SIM * 1, Hướng dẫn bắt đầu nhanh * 1, Thẻ bảo hành * 1', '1701414652_vn-11134201-7r98o-lla5amq9jetkdf.jpg', 'oppo'),
(16, 1, 1, 'OPPO Reno 10 Pro 5G', 888, 'Điện thoại OPPO Reno 10 Pro 5G', 'Oppo Reno 10 Pro 5G (ROM Trung Quốc)<br>\r\n> Tên Model --- PHV110<br>\r\n> Kích thước --- 163.0 * 74.0 * 7.68mm, Trọng lượng Xấp xỉ. 186g (bao gồm cả pin)<br>\r\n> Ram + ROM --- RAM LPDDR5 16GB + ROM 256GB / 512GB UFS3.1<br>\r\n> Màn hình --- Màn hình cong AMOLED 6,74 inch; 100% DCI-P3<br>\r\n> Tỷ lệ màn hình --- 93,90%, 450 PPI<br>\r\n> Độ phân giải màn hình --- 2772 ” 1240 (FHD +)<br>\r\n> Máy ảnh --- Camera trước: Máy ảnh Selfie 32MP (F / 2.4); FOV 90°<br>\r\n> Máy ảnh --- Camera sau: Máy ảnh 50MP chính (f / 1.8; FOV 84°; 6p) + Máy ảnh lấy nét dài 32MP (f / 2.0; FOV 49°; Máy ảnh góc rộng 6P) + 8MP (f / 2.2, FOV 112°; 5p)<br>\r\n> Cpu --- Mật độ 8200 Ocat Core,<br>\r\n> Gpu --- Cánh tay Mali G610 MC6 @ 950MHz<br>\r\n> Pin --- 4600mAh (điển hình) / 4440mAh (tối thiểu), 100W SuperCharge; SuperCharge; SuperCharge 2.0 “SuperVOOC ” VOOC 3.0 ” PD (9V / 2A) ” QC2.0 (9V / 2A)<br>\r\n> Khác --- Wi-Fi 6 (802.11ax) “Wi-Fi 5 (802.11ac) ” 802.11a / b / g / n /; 2 ” 2 MIMO; 8 Âm thanh luồng không gian MU-MIMO; NFC<br>\r\n> Hệ điều hành --- ColorOS 13.1 Dựa trên Android 13.0; có Cập nhật đa ngôn ngữ & OTA và cửa hàng Google play và có một số ứng dụng tiếng Trung mà bạn không thể xóa<br>\r\n> Mạng---- Toàn bộ Netcom, Chế độ chờ kép hai SIM<br>\r\n2g GSM: 850 / 900 / 1800MHz<br>\r\n3g WCDMA: Băng tần 1 / 4 / 5 / 8<br>\r\n4g LTE FDD: Băng tần 1 / 3 / 4 / 5 / 8 / 28A<br>\r\n4g LTE TDD: Băng tần 34 / 38 / 39 / 40 / 41<br>\r\n5g NR: n1 / n5 / n8 / n28A / n41 / n77 / n78<br>\r\n<br>\r\nTrong hộp: Điện thoại * 1, Bộ sạc nguồn * 1, Cáp loại C * 1, Vỏ * 1, Dụng cụ thẻ SIM * 1, Hướng dẫn bắt đầu nhanh * 1, Thẻ bảo hành * 1', '1701414824_reno10-vn-11134201-7r98o-lla5cu7h9ryga0.jpg', 'oppo'),
(17, 2, 5, 'Giày bông Sneaker', 80, 'Giày bông Sneaker đi trong nhà, ra ngoài đường được', 'Dép đi trong nhà mùa đông thiết kế theo các mẫu sneaker hot hiện nay, hàng sẵn kho\r\n Chất liệu: Cotton tổng hợp, đế cao su không trượt<br>\r\n Giày bông thiết kế theo các mẫu sneaker hot nhất hiện nay<br>\r\n Đế chống trượt, an toàn trên sàn trơn; bọc vải lông cừu dày, giữ ấm trong mùa đông <br>\r\n Cảm giác chạm mềm mại, ấm và thoải mái khi mang; là một món quà ấm áp trong mùa đông này cho gia đình và bạn bè <br>\r\n Thích hợp cho nam nữ; Có thể giặt bằng máy; chi tiết size vui lòng xem dưới đây <br>', '1701415224_dep01vn-11134201-7r98o-lmha9nrbjtgf5f.jpg', 'giày dép'),
(18, 2, 5, 'Dép Bàn Chân Cute', 10, 'Dép Bàn Chân Cute Đúc Liền Khối Dép Móng vuốt', 'THÔNG TIN SẢN PHẨM<br>\r\n\r\n-Dép được đúc nguyên khôi không giản nở<br>\r\n\r\nADép được làm bằng chất liệu cao su non Xịn cao cấp<br>\r\n\r\n-Dép nam nữ quai ngang được thiết kế với đường nét tinh tế<br>\r\n\r\n✅ Size từ 36 đến 40\r\n\r\n', '1701415331_dep-02vn-11134201-23030-n1mdnztzeeoved.jpg', 'dép'),
(19, 2, 5, 'Dép 3LENCIAGA UNISEX', 5, 'Dép 3LENCIAGA UNISEX quai ngang cao cấp cho bạn trẻ sành điệu, chống trơn trượt siêu HOT HIT', 'MÔ TẢ SẢN PHẨM<br>\r\nDép 3LENCIAGA UNISEX quai ngang cao cấp siêu nhẹ, tăng chiều cao 4cm, chống trơn trượt siêu hot 2023 <br>\r\n♥ Thành phần: Cao su<br>\r\n																		\r\n♥ dép thời trang quai ngang không những là món phụ kiện thời trang sang trọng làm quà tặng, đi chơi, dự tiệc mà còn là vật hộ mệnh của bạn.<br>\r\n\r\nHãy chọn cho mình 1 màu phù hợp nhé...', '1701415472_dep03vn-11134207-7r98o-lmh19xzbu02n6a.jpg', 'dép'),
(20, 2, 5, 'DÉP BÔNG NỮ 2 QUAI', 3, 'DÉP LÔNG,DÉP BÔNG NỮ 2 QUAI NGANG TĂNG CHIỀU CAO Dép Đế Mềm Dày 7Cm Thời Trang Thu Đông Hàn Quốc 2023 Cho Nữ', 'Chất liệu trên: Sang trọng<br>\r\nGiới tính áp dụng: Nữ<br>\r\nĐộ dày: Độ dày thông thường<br>\r\nChức năng chức năng: Thoáng khí<br>\r\nCác yếu tố phổ biến: Đổ xô<br>\r\nChiều cao gót: 7 cm<br>\r\nHình dạng gót chân: phẳng<br>\r\nPhong cách: Một từ kéo<br>', '1701417260_depbong-sg-11134201-7r99n-ll8p2a0rmcdx37.jpg', 'deps'),
(21, 3, 5, 'Cọ vệ sinh chai lọ', 2, 'Cọ vệ sinh chai lọ / đồ dùng nhà bếp KAIMEIDI thiết kế đa năng tiện dụng', 'Phương pháp sạc: Sạc USB<br>\r\n\r\nĐiều chỉnh bánh răng: 3 bánh răng<br>\r\n\r\nLàm sạch xoay 360 độ, dễ dàng xử lý các vết bẩn khác nhau<br>\r\n\r\nNhiều loại đầu bàn chải cho nhiều tình huống khác nhau (bản ban công, nhà bếp, phòng tắm)<br>\r\n\r\nĐầu bàn chải phụ kiện: Nylon, miếng cọ rửa, đầu bàn chải xốp bọt biển<br>', '1701418561_covesinh-sg-11134201-23030-pimhvklkg6nv86.jpg', 'lt'),
(22, 4, 5, 'Bộ cổ bẻ nam Viền 2 Sọc Ngang', 10, 'Bộ thể thao nam, Bộ cổ bẻ nam Viền 2 Sọc Ngang, Bộ quần áo cộc nam chất liệu co dãn 4 chiều cao cấp - BN360', 'THÔNG TIN SẢN PHẨM: Bộ thể thao cổ bẻ nam<br>\r\n✔️ Chất liệu vải CVC Cá Sấu cotton co dãn 4 chiều cao cấp, lên dáng chuẩn form, chất xốp nhẹ, không bám dính mồ hôi nên người dùng sẽ cảm thấy rất thoải mái khi mặc vào mùa hè.<br>\r\n✔️ Màu sắc: 4 màu đen, trắng, nâu, xanh than.<br>\r\n✔️ Bộ thể thao nam là phụ kiện thời trang đơn giản nhưng không thể thiếu cho mùa hè. Các anh có thể mặc bộ thể thao ở nhà, hay dùng làm đồ thể thao, tập gym rất mát mẻ và thoải mái.', '1701419133_quanaovn-11134207-7qukw-lho9n0hi5ojp08.jpg', 'áo'),
(23, 4, 5, 'Bộ quần áo nỉ thể thao mùa đông', 20, 'Bộ Quần Áo Nỉ Thể Thao Nam Mùa Đông LUSSO, Vải Cotton USA, Mềm Mịn, Phối Kẻ Sọc, Thiết Kế Khỏe Khoắn BNF-002', 'THÔNG TIN VỀ SẢN PHẨM: Bộ Thu Đông Nam LUSSO Cao Cấp Kiểu Dáng Thể Thao Khỏe Khoắn Năng Động. \r\n<br>\r\n<br>\r\n<br>\r\n➤ Thương hiệu: LUSSO\r\n<br>\r\n➤ Màu sắc:3 màu <br>\r\n<br>\r\n➤ Chất liệu: Cotton USA (Vải đã xử lý)<br>\r\n<br>\r\n➤ Sản Phẩm Bao Gồm: 1 áo  + 1 quần <br>\r\n<br>\r\n➤ Thông số size:  M, L, XL. XXL.<br>\r\n<br>\r\n➤ Thời trang theo phong cách lịch lãm hiện đại.', '1701697894_ao-ni1vn-11134207-7r98o-lo5aolu3sx6f8b.jpg', 'áo'),
(24, 4, 5, 'Bộ quần áo thể thao ngoại cỡ', 35, 'Bộ Quần Áo Nam Thể Thao Ngoại Cỡ Bigsize Cho Người Béo 80-110kg Bendu BIG2204 kẻ sọc', 'Bộ Quần Áo Mặc Nhà Thể Thao Nam Mùa<br>\r\n<br>\r\nHè Phong Cách Cao Cấp<br>\r\n<br>\r\n🔰 THÔNG TIN CHI TIẾT <br>\r\n<br>\r\n🎗 Chất liệu: Vải CVC sợi cotton kết hợp sợi tổng hợp\r\n<br>\r\n🎗 Màu sắc: Đen <br>\r\n\r\n🎗 Thương hiệu: BENDU\r\n<br>\r\n🎗 Xuất xứ: Việt Nam \r\n<br>\r\n🎗Size: 3XL, 4XL, 5XL', '1701698043_aothethaoa212a10c5333b8bface68468e48945fa.jpg', 'quâno'),
(25, 4, 5, 'Bộ quần áo nữ mặc nhà', 20, 'Bộ quần áo nữ mặc nhà họa tiết kẻ cổ bèo đính cúc Evalover', '𝐓𝐇Ô𝐍𝐆 𝐓𝐈𝐍 𝐒Ả𝐍 𝐏𝐇Ẩ𝐌\r\n<br>\r\nBộ quần áo nữ mặc nhà họa tiết kẻ cổ bèo đính cúc Evalover chất lụa kẻ nhật mềm mát mịn thoáng mát\r\n<br>\r\nChất liệu  : lụa kẻ nhật', '1701698258_bo-ao-nuvn-11134207-7qukw-li9xo7z7uk0i22.jpg', 'ao'),
(26, 4, 5, 'Áo nỉ cổ tròn họa tiết kẻ xọc', 37, 'Áo Nỉ Cổ Tròn Họa Tiết Kẻ Sọc Trắng Đen Thời Trang Cho Nam', 'Giới tính áp dụng: kiểu nam: thể thao Nhóm tuổi phù hợp: trẻ em (3 ~ 8 tuổi, 100 ~ 140cm) Mùa thích hợp: mùa thu Chất liệu: sọc Độ dày: Chung Chiều dài tay áo: dài tay Kiểu đóng: áo chui đầu Có mũ hay không: Không trùm đầu Tên vải: cottonMàu sắc: áo sọc số 10-Đen, áo nỉ sọc số 10-trắng Chiều cao phù hợp: 120cm, 130cm, 140cm, 150cm, 160cm', '1701698353_ni-co-tronsg-11134201-7r9bv-llodmr053rec06.jpg', 'ao');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int NOT NULL,
  `first_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `mobile` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address1` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address2` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES
(1, 'chi', 'tho', 'tho493@gmail.com', 'tho493', '3859250', 'saodo', 'haiduong');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Chỉ mục cho bảng `orders_info`
--
ALTER TABLE `orders_info`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`order_pro_id`),
  ADD KEY `order_products` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `orders_info`
--
ALTER TABLE `orders_info`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `order_products`
--
ALTER TABLE `order_products`
  MODIFY `order_pro_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders_info`
--
ALTER TABLE `orders_info`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`);

--
-- Các ràng buộc cho bảng `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products` FOREIGN KEY (`order_id`) REFERENCES `orders_info` (`order_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
