/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package mahasiswa;

import java.util.Scanner;

class Mahasiswa {
    String nama;
    long nim;
    String jurusan;
    String alamat;
    
    public void tampilkanData(){
       System.out.println("=====>MAHASISWA<=====");
       System.out.println("Nama :"+ nama);
       System.out.println("Nim :"+ nim);
       System.out.println("Jurusan :"+ jurusan);
       System.out.println("Alamat :"+ alamat);
    }
}

public class Pbo2{
    public static void main(String[] args) {
        Scanner input = new Scanner(System.in);
        Mahasiswa mahasiswa = new Mahasiswa();
        
        System.out.print("Masukkan nama :");
        mahasiswa.nama = input.nextLine();
        
        System.out.print("Masukkan nim :");
        mahasiswa.nim = input.nextLong();
        input.nextLine();
        
        System.out.print("Masukkan jurusan :");
        mahasiswa.jurusan = input.nextLine();
        
        System.out.print("Masukkan alamat :");
        mahasiswa.alamat = input.nextLine();
        
        System.out.println("\n  Mahasiswa");
        mahasiswa.tampilkanData();
    }
}