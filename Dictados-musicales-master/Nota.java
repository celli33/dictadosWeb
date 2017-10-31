import java.util.ArrayList;
import java.util.Random;


//clase Nota que tiene dos atributos el nombre de la nota 
//y un arrayList que referencía a sus notas posibles
public class Nota {
	
	private String name;
	private ArrayList<Nota> notasPosibles;
	private int aux;
	
	//constructor de la clase Nota que le da un nombre
	Nota(String name)
	{
		this.name=name;
		this.notasPosibles= new ArrayList<Nota>();
	}
	
	//metodo que agrega las notas posibles al objeto nota
	//recibe un Array de notas que contiene las notas a las que puede ir el objeto nota
	public void notasPosibles(Nota...notasPosibles)
	{
		//inicialicamos el array de notas posibles
		this.notasPosibles= new ArrayList<Nota>();
		
		//System.out.println("tamaño del Array notas Posibles: "+notasPosibles.length+ " de la nota "+this.name);
		//hacemos un for segun el tamaño del array recibido para agregar las notas al array de notasPosibles
		for(int i=0;i<notasPosibles.length;i++)
		{ //agregamos la nota posible al arrayList
		   this.notasPosibles.add(notasPosibles[i]);
		   //System.out.println("Agregando Nota Posible:"+ notasPosibles[i].name+" a nota "+this.name);
		}
		
		
	}
	

	//getters y setters
	public String getName() {
		return name;
	}

	public void setName(String name) {
		this.name = name;
	}
	
	
	//metodo que elige la nota siguiente en el dictado
	public Nota eligeNotaSiguiente()
	{	
		Random rnd= new Random();
		//casteamos el aleatorio y lo ponemos en un rango de 0 a 100 
		//para hacer más amplio el rango de cambio de notas
		aux=(int) (rnd.nextDouble()*101);
		//System.out.println(aux);
		
		//nos aseguramos de que si la nota es b4 no baje más
		if(this.name.equals("b4"))
		{//System.out.println("Agregando nota: "+this.notasPosibles.get(0).name+" al dictado");
		 return(notasPosibles.get(0));
		}
		//nos aseguramos de que si la nota es g6 no suba más
		if(this.name.equals("g6"))
		{
			//System.out.println("Agregando nota: "+this.notasPosibles.get(0).name+" al dictado");
			 return(notasPosibles.get(0));
		}
		//si el aux es menor a 50 va a la posicion 0 de su arraylist 
		if(aux<=50)
		{
		  //System.out.println("Agregando nota: "+this.notasPosibles.get(0).name+" al dictado");
		 return(notasPosibles.get(0));
			
		}
		//si el aux es mayor a 50 va a la posicion de su arraylist
		if(aux>50)
		{
			//System.out.println("Agregando nota: "+this.notasPosibles.get(1).name+" al dictado");
			 return(notasPosibles.get(1));
		}
		
		return(null);
	}

	
	
	
	
	

}
