package webede.services;

import javax.jws.WebMethod;
import javax.jws.WebService;
import javax.jws.soap.SOAPBinding;
import javax.jws.soap.SOAPBinding.Style;

@WebService
@SOAPBinding(style = Style.DOCUMENT)
public interface DorayakiService {
    @WebMethod
    public String createBahanBaku();

    @WebMethod
    public String addBahanBaku(String nama_bahan, int stok_bahan);

    @WebMethod
    public String createResepDorayaki();

    @WebMethod
    public String addResepDorayaki(String nama_resep, int id_bahan_baku1, int id_bahan_baku2, int id_bahan_baku3, int jumlah_bahan1, int jumlah_bahan2, int jumlah_bahan3);\

    @WebMethod
    public String createUser();

    @WebMethod
    public String addUser(String username, String email, String password);

    @WebMethod
    public String createRequest();

    @WebMethod
    public String addRequest(int id_resep, int jumlah_dorayaki);
}
