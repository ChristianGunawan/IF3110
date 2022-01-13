package webede.services;

import java.sql.*;

public class DBHandler {
    private Connection connection;
    private static String DB_URL = "http://localhost:8080/phpmyadmin/index.php?route=/database/structure&server=1&db=webede";
    private static String DB_Username = "";
    private static String DB_Password = "";

    public DBHandler() {
        try {
            System.out.println("Connecting to MYSQL DB");
            Class.forName("com.mysql.jdbc.Driver");
            this.connection = DriverManager.getConnection(DB_URL, DB_Username, DB_Password);
            System.out.println("Database berhasil terhubung !");
        } catch (Exception e) {
            e.printStackTrace();
            System.out.println("Gagal terhubung ke Database !");
        }
    }

    public Connection getConnection() {
        return this.connection;
    }
}