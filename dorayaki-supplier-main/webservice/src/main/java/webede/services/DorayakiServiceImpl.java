package webede.services;

import javax.jws.WebService;

import java.sql.*;

@WebService(endpointInterface = "webede.services.DorayakiService")
public class DorayakiServiceImpl implements DorayakiService {
    @Override
    public String createBahanBaku() {
        try {
            DBHandler handler = new DBHandler();
            Connection conn = handler.getConnection();
            Statement state = conn.createStatement();
            String sql = "CREATE TABLE IF NOT EXISTS bahan_baku (id_bahan INT NOT NULL AUTO_INCREMENT PRIMARY KEY, nama_bahan VARCHAR(255) NOT NULL, stok_bahan INT NOT NULL);";
            int count = state.executeUpdate(sql);
            return "Berhasil create table Bahan Baku dengan return value : " + count;
        } catch (Exception e) {
            e.printStackTrace();
            return "Error create table " + e.getMessage();
        }
    }

    @Override
    public String addBahanBaku(String nama_bahan, int stok_bahan) {
        try {
            DBHandler handler = new DBHandler();
            Connection conn = handler.getConnection();
            Statement state = conn.createStatement();
            String sql = "INSERT INTO bahan_baku(nama_bahan, stok_bahan) VALUES ('%s', %d);";
            String formatSQL = String.format(sql, nama_bahan, stok_bahan);
            int count = state.executeUpdate(formatSQL);
            return "Berhasil menambahkan bahan baku dengan return value : " + count;
        } catch (Exception e) {
            e.printStackTrace();
            return "Error menambahkan bahan baku " + e.getMessage();
        }
    }

    @Override
    public String createResepDorayaki() {
        try {
            DBHandler handler = new DBHandler();
            Connection conn = handler.getConnection();
            Statement state = conn.createStatement();
            String sql = "CREATE TABLE IF NOT EXISTS resep (id_resep INT NOT NULL AUTO_INCREMENT PRIMARY KEY, nama_resep VARCHAR(255) NOT NULL, id_bahan_baku1 INT NOT NULL, id_bahan_baku2 INT, id_bahan_baku3 INT, jumlah_bahan1 INT NOT NULL, jumlah_bahan2 INT, jumlah_bahan3 INT);";
            int count = state.executeUpdate(sql);
            return "Berhasil create table Resep dengan return value : " + count;
        } catch (Exception e) {
            e.printStackTrace();
            return "Error create table " + e.getMessage();
        }
    }

    @Override
    public String addResepDorayaki(String nama_resep, int id_bahan_baku1, int id_bahan_baku2, int id_bahan_baku3, int jumlah_bahan1, int jumlah_bahan2, int jumlah_bahan3) {
        try {
            DBHandler handler = new DBHandler();
            Connection conn = handler.getConnection();
            Statement state = conn.createStatement();
            String sql = "INSERT INTO resep(nama_resep, id_bahan_baku1, id_bahan_baku2, id_bahan_baku3, jumlah_bahan1, jumlah_bahan2, jumlah_bahan3) VALUES ('%s', %d, %d, %d, %d, %d, %d);";
            String formatSQL = String.format(sql, nama_resep, id_bahan_baku1, id_bahan_baku2, id_bahan_baku3, jumlah_bahan1, jumlah_bahan2, jumlah_bahan3);
            int count = state.executeUpdate(formatSQL);
            return "Berhasil menambahkan resep dorayaki dengan return value : " + count;
        } catch (Exception e) {
            e.printStackTrace();
            return "Error menambahkan resep dorayaki " + e.getMessage();
        }
    }

    @Override
    public String createUser() {
        try {
            DBHandler handler = new DBHandler();
            Connection conn = handler.getConnection();
            Statement state = conn.createStatement();
            String sql = "CREATE TABLE IF NOT EXISTS user (id_user INT NOT NULL AUTO_INCREMENT PRIMARY KEY, username VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL);";
            int count = state.executeUpdate(sql);
            return "Berhasil create table User dengan return value : " + count;
        } catch (Exception e) {
            e.printStackTrace();
            return "Error create table " + e.getMessage();
        }
    }

    @Override
    public String addUser(String id_user, String username, String email, String password) {
        try {
            DBHandler handler = new DBHandler();
            Connection conn = handler.getConnection();
            Statement state = conn.createStatement();
            String sql = "INSERT INTO user(username, email, password) VALUES ('%s', '%s', '%s');";
            String formatSQL = String.format(sql, username, email, password);
            int count = state.executeUpdate(formatSQL);
            return "Berhasil menambahkan user dengan return value : " + count;
        } catch (Exception e) {
            e.printStackTrace();
            return "Error menambahkan user " + e.getMessage();
        }
    }

    @Override
    public String createRequest() {
        try {
            DBHandler handler = new DBHandler();
            Connection conn = handler.getConnection();
            Statement state = conn.createStatement();
            String sql = "CREATE TABLE IF NOT EXISTS request (id_request INT NOT NULL AUTO_INCREMENT PRIMARY KEY, id_resep INT NOT NULL, jumlah_dorayaki INT NOT NULL, ts_request TIMESTAMP NOT NULL);";
            int count = state.executeUpdate(sql);
            return "Berhasil create table Request dengan return value : " + count;
        } catch (Exception e) {
            e.printStackTrace();
            return "Error create table " + e.getMessage();
        }
    }

    @Override
    public String addRequest(int id_resep, int jumlah_dorayaki) {
        try {
            DBHandler handler = new DBHandler();
            Connection conn = handler.getConnection();
            Statement state = conn.createStatement();
            String sql = "INSERT INTO request(id_resep, jumlah_dorayaki) VALUES (%d, %d);";
            String formatSQL = String.format(sql, id_resep, jumlah_dorayaki);
            int count = state.executeUpdate(formatSQL);
            return "Berhasil menambahkan request dengan return value : " + count;
        } catch (Exception e) {
            e.printStackTrace();
            return "Error menambahkan request " + e.getMessage();
        }
    }

}
