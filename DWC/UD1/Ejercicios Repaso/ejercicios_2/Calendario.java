package ejercicios_2;

public class Calendario {
	private String nombre;
	private ArrayList<int> dias;
    
	public Calendario() {
		this.nombre = "";
		this.dias = new ArrayList<int>();
	}

	// Declare toString
	@Override
	public String toString() {
		return nombre;
	}
}
