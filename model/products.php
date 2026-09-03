<?php

$products = [
    [
        "id" => 0,
        "name" => "Mechanical Keyboard",
        "description" => "RGB mechanical keyboard with blue switches.",
        "price" => 79.99,
        "image" => "keyboard.jpg",
        "category" => "Peripherals"
    ],
    [
        "id" => 1,
        "name" => "Gaming Mouse",
        "description" => "Wireless gaming mouse with adjustable DPI.",
        "price" => 49.90,
        "image" => "mouse.jpg",
        "category" => "Peripherals"
    ],
    [
        "id" => 2,
        "name" => "24-inch Monitor",
        "description" => "Full HD monitor with 100 Hz refresh rate.",
        "price" => 129.99,
        "image" => "monitor.jpg",
        "category" => "Monitors"
    ],
    [
        "id" => 3,
        "name" => "USB-C Hub",
        "description" => "USB-C hub with HDMI, USB 3.0 and SD card reader.",
        "price" => 34.95,
        "image" => "usb_hub.jpg",
        "category" => "Accessories"
    ],
    [
        "id" => 4,
        "name" => "External SSD",
        "description" => "1 TB portable SSD with USB 3.2 connection.",
        "price" => 89.50,
        "image" => "ssd.jpg",
        "category" => "Storage"
    ],
    [
        "id" => 5,
        "name" => "Webcam",
        "description" => "Full HD webcam with integrated microphone.",
        "price" => 39.99,
        "image" => "webcam.jpg",
        "category" => "Peripherals"
    ],
    [
        "id" => 6,
        "name" => "Gaming Headset",
        "description" => "Headset with surround sound and detachable microphone.",
        "price" => 59.90,
        "image" => "headset.jpg",
        "category" => "Audio"
    ],
    [
        "id" => 7,
        "name" => "Wi-Fi Adapter",
        "description" => "USB Wi-Fi adapter compatible with Wi-Fi 6.",
        "price" => 24.99,
        "image" => "wifi_adapter.jpg",
        "category" => "Networking"
    ],
    [
        "id" => 8,
        "name" => "Laptop Stand",
        "description" => "Adjustable aluminium stand for laptops.",
        "price" => 29.95,
        "image" => "laptop_stand.jpg",
        "category" => "Accessories"
    ],
    [
        "id" => 9,
        "name" => "USB Flash Drive",
        "description" => "128 GB USB 3.2 flash drive.",
        "price" => 18.50,
        "image" => "usb_drive.jpg",
        "category" => "Storage"
    ],
    [
        "id" => 10,
        "name" => "Bluetooth Speaker",
        "description" => "Portable Bluetooth speaker with 12-hour battery life.",
        "price" => 44.90,
        "image" => "speaker.jpg",
        "category" => "Audio"
    ],
    [
        "id" => 11,
        "name" => "Laptop Backpack",
        "description" => "Water-resistant backpack for laptops up to 15.6 inches.",
        "price" => 39.95,
        "image" => "backpack.jpg",
        "category" => "Accessories"
    ]
];

$_SESSION['products'] = $products;
