/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package tarea_jdbc;

import java.sql.*;

/**
 *
 * @author Sergio
 */
public class Conexion {
    Connection conect = null;
    String elDriver = "com.mysql.cj.jdbc.Driver";
    String user = "root";
    String password = "123456";
    String dbName = "sellsoft";
    String ip = "localhost";
    String port = "3306";
    
    String unido = "jdbc:mysql://" + ip + ":" + port + "/" + dbName;
    
    public Connection conectando(){
        try {
            //1.- Cargar Driver
            Class.forName(elDriver);
            
            //- Establecer la Conexion
            
            conect = DriverManager.getConnection(unido, user, password);
            
            //generar y mandar la consulta con ayuda de la Conexion que es conecta
            Statement st = conect.createStatement();
            
            //objeto de tipo tabla que nos va a ayudar a pintar en consola nuestros datos de la tablas 
           ResultSet  rs = st.executeQuery("SELECT * FROM proyecto");
            
            //Gestionamos la menera en que se ven los registros con el st  el next nos ayuda a 
            //controlar hasta donde se va a romper el while
            while (rs.next()) {
                
                System.out.println(rs.getInt("id")+" "+rs.getString("nombre_proyecto")+" "
                +rs.getString("fecha_inicio")+" "+rs.getString("fecha_estimada_entrega")
                +" "+rs.getString("fecha_real_entrega")+" "+rs.getString("fecha_pago_periodico")
                +" "+rs.getString("estado_proyecto")+" "+rs.getInt("cliente"));
                
            }
            
            rs.close();
            st.close();
            conect.close();
            
        } catch (Exception e) {
            System.out.println("Error de conexion"+e);
        }
        
        return conect;
    }
}
