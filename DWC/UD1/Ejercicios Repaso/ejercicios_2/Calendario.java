package ejercicios_2;

import java.util.*;
import java.lang.*;
import java.io.*;

import java.util.ArrayList;

public class Calendario {
	private String nombre;
	private ArrayList<Integer> dias;

	public Calendario() {
		this.nombre = "";
		this.dias = new ArrayList<Integer>();
	}

	public void setNombre(String nombre) {
		this.nombre = nombre;
	}

	public String getNombre() {
		return nombre;
	}

	public void setDias(ArrayList<Integer> dias) {
		this.dias = dias;
	}

	public ArrayList<Integer> getDias() {
		return dias;
	}

	public void identificar(int num) {
		ArrayList<Integer> meses30 = new ArrayList<Integer>();
		ArrayList<Integer> meses31 = new ArrayList<Integer>();
		ArrayList<Integer> meses28 = new ArrayList<Integer>();

		for (int i = 1; i != 31; i++) {
			if (i <= 31) {
				meses30.add(i);
				if (i <= 30) {
					meses31.add(i);
					if (i <= 28) {
						meses28.add(i);
					}
				}
			}
		}

		switch (num) {
			case 1:
				this.nombre = "Enero";
				this.dias = meses31;
				break;
			case 2:
				this.nombre = "Febrero";
				this.dias = meses28;
				break;
			case 3:
				this.nombre = "Marzo";
				this.dias = meses31;
				break;
			case 4:
				this.nombre = "Abril";
				this.dias = meses30;
				break;
			case 5:
				this.nombre = "Mayo";
				this.dias = meses31;
				break;
			case 6:
				this.nombre = "Junio";
				this.dias = meses30;
				break;
			case 7:
				this.nombre = "Julio";
				this.dias = meses31;
				break;
			case 8:
				this.nombre = "Agosto";
				this.dias = meses31;
				break;
			case 9:
				this.nombre = "Septiembre";
				this.dias = meses30;
				break;
			case 10:
				this.nombre = "Octubre";
				this.dias = meses31;
				break;
			case 11:
				this.nombre = "Noviembre";
				this.dias = meses30;
				break;
			case 12:
				this.nombre = "Diciembre";
				this.dias = meses31;
				break;
			default:

				break;
		}
	}

	public void mostrar() {
		System.out.print(nombre + " [");

		for (int i = 0; i < dias.size(); i++) {
			System.out.print(" " + dias.get(i) + " ");
		}

		System.out.println("]");
	}
}
