<?php
require_once __DIR__ . '/../includes/config.php';

try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
        DB_USER,
        DB_PASS
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create users table
    $pdo->exec("CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) UNIQUE NOT NULL,
        password VARCHAR(255) NOT NULL,
        email VARCHAR(100) UNIQUE NOT NULL,
        phone VARCHAR(20),
        balance DECIMAL(10,2) DEFAULT 0.00,
        role ENUM('user', 'admin') DEFAULT 'user',
        status ENUM('active', 'inactive', 'banned') DEFAULT 'active',
        last_login DATETIME,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
    echo "Users table created successfully<br>";

    // Create lottery_results table
    $pdo->exec("CREATE TABLE IF NOT EXISTS lottery_results (
        id INT AUTO_INCREMENT PRIMARY KEY,
        lottery_type ENUM('2D', '3D', 'Thai', 'Laos') NOT NULL,
        draw_date DATE NOT NULL,
        draw_time TIME NOT NULL,
        result_number VARCHAR(20) NOT NULL,
        status ENUM('pending', 'active', 'completed') DEFAULT 'pending',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
    echo "Lottery results table created successfully<br>";

    // Create payments table
    $pdo->exec("CREATE TABLE IF NOT EXISTS payments (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        amount DECIMAL(10,2) NOT NULL,
        payment_type ENUM('deposit', 'withdrawal') NOT NULL,
        payment_method VARCHAR(50) NOT NULL,
        transaction_id VARCHAR(100),
        proof_image VARCHAR(255),
        status ENUM('pending', 'approved', 'rejected') DEFAULT 'pending',
        remark TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
    echo "Payments table created successfully<br>";

    // Create test user
    $username = 'test';
    $password = password_hash('test123', PASSWORD_DEFAULT);
    $email = 'test@example.com';
    
    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, password, email, role) VALUES (?, ?, ?, 'admin')");
        $stmt->execute([$username, $password, $email]);
        echo "Test user created successfully<br>";
    } catch (PDOException $e) {
        if ($e->getCode() != 23000) { // Skip if user already exists
            throw $e;
        }
    }

    // Create notifications table
    $pdo->exec("CREATE TABLE IF NOT EXISTS notifications (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        message TEXT NOT NULL,
        type ENUM('info', 'success', 'warning', 'error') DEFAULT 'info',
        is_read BOOLEAN DEFAULT FALSE,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
    echo "Notifications table created successfully<br>";

    // Create API logs table
    $pdo->exec("CREATE TABLE IF NOT EXISTS api_logs (
        id INT AUTO_INCREMENT PRIMARY KEY,
        request_method VARCHAR(10) NOT NULL,
        request_path VARCHAR(255) NOT NULL,
        request_body TEXT,
        response_code INT,
        response_body TEXT,
        ip_address VARCHAR(45),
        user_agent VARCHAR(255),
        duration FLOAT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
    echo "API logs table created successfully<br>";

    // Create default admin user
    $adminPassword = password_hash('admin123', PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT IGNORE INTO users (username, email, password, role) VALUES (?, ?, ?, 'admin')");
    $stmt->execute(['admin', 'admin@2d3dkobo.com', $adminPassword]);
    echo "Default admin user created successfully<br>";

    // Insert some sample lottery results
    $stmt = $pdo->prepare("INSERT INTO lottery_results (lottery_type, draw_date, draw_time, result_number, status) VALUES (?, ?, ?, ?, 'active')");
    
    // Sample data
    $sampleResults = [
        ['2D', date('Y-m-d'), '12:00:00', '25'],
        ['2D', date('Y-m-d'), '16:30:00', '47'],
        ['3D', date('Y-m-d'), '14:00:00', '234'],
        ['Thai', date('Y-m-d'), '15:00:00', '567890']
    ];

    foreach ($sampleResults as $result) {
        $stmt->execute($result);
    }
    echo "Sample lottery results inserted successfully<br>";

    echo "Database setup completed successfully!";

} catch (PDOException $e) {
    die("Database Error: " . $e->getMessage());
}
