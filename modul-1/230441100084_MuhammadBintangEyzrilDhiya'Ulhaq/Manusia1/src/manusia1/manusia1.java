/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package manusia1;
class Manusia {
    String nama;
    int umur;
    String alamat;
        public void berlari(){
        System.out.println(this.nama + " sedang berlari");
    }
        public void berjalan(){
        System.out.println( this.nama + "  sedang berjalan");
    }
}
public class manusia1 {
    

    public static void main(String[] args) {


        Manusia orang1 = new Manusia();
        Manusia orang2 = new Manusia();
        
        orang1.nama = "Bintang";
        orang1.umur = 18;
        orang1.alamat = "Pasuruan";
        System.out.println("Nama Objek 1 adalah " + orang1.nama);
        System.out.println("Alamat Objek 1 adalah " + orang1.alamat);
        System.out.println("Umur Objek 1 adalah " + orang1.umur + " Tahun");
        orang1.berjalan();
        orang1.berlari();
        System.out.println("Terimakasih");
        
        orang2.nama ="Riyyan";
        orang2.umur =18;
        orang2.alamat = "Tuban";
        System.out.println("Nama Objek 2 adalah " + orang2.nama);
        System.out.println("Alamat Objek 2 adalah " + orang2.alamat);
        System.out.println("Umur Objek 2 adalah " + orang2.umur + " Tahun");
        orang2.berjalan();
        orang2.berlari();
        System.out.println("Terimakasih");
    }        
    
}