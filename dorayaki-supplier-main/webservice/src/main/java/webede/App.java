package webede;

/**
 * Hello world!
 *
 */

 import javax.xml.ws.Endpoint;

import webede.services.DorayakiServiceImpl;

public class App 
{
    public static void main( String[] args )
    {
        System.out.println( "Almost published !" );
        Endpoint.publish("http://localhost:9999/webservice/dorayaki", new DorayakiServiceImpl());
        System.out.println( "Published (???)" );
    }
}
