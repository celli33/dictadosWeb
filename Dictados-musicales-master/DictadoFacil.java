import java.util.ArrayList;
import java.util.Random;

//clase que contiene dos atributos las notas posibles del dictado facil
//un array de notas que contiene las notas posibles
public class DictadoFacil {
	
	//
	Nota b4,c5,d5,e5,f5,g5,a5,b5,c6,d6,e6,f6,g6;
	Nota[] notasPosibles;
	public final static int   numNotasposibles=13;
	//lista que guarda el dictado en String
	ArrayList<String> dictadoString;
	public DictadoFacil()
	{
		//inicialicamos el array ahora inicialicamos el array con una variable final
		//para así sea fácil modificar el número de elementos posibles en el dictado
		notasPosibles= new Nota[ numNotasposibles];
		//al array de notas le agregamos la nota inicializada con el nombre del nota
		notasPosibles[0]=b4=new Nota("b4");
		notasPosibles[1]=c5=new Nota("c5");
		notasPosibles[2]=d5= new Nota("d5");
		notasPosibles[3]=e5= new Nota("e5");
		notasPosibles[4]=f5= new Nota("f5");
		notasPosibles[5]=g5= new Nota("g5");
		notasPosibles[6]=a5= new Nota("a5");
		notasPosibles[7]=b5= new Nota("b5");
		notasPosibles[8]=c6= new Nota("c6");
		notasPosibles[9]=d6= new Nota("d6");
		notasPosibles[10]=e6= new Nota("e6");
		notasPosibles[11]=f6= new Nota("f6");
		notasPosibles[12]=g6= new Nota("g6");

		//inicializamos el arraylist donde guardaremos el nombre de las notas para relacionarlos 
		//con el archivo raw/"nombre de la nota" que contiene el sonido
		dictadoString= new ArrayList<String>();
		
	}
	
	
	public ArrayList<String> generaDictado(int numNotas)
	{
		ArrayList<Nota> dictado= new ArrayList<Nota>();
		
		//llamamos el metodo notasPosibles de la nota y le agregamos las notas posibles
		b4.notasPosibles(c5);
		c5.notasPosibles(b4,d5);
		d5.notasPosibles(c5,e5);
		e5.notasPosibles(d5,f5);
		f5.notasPosibles(e5,g5);
		g5.notasPosibles(f5,a5);
		a5.notasPosibles(g5,b5);
		b5.notasPosibles(a5,c6);
		c6.notasPosibles(b5,d6);
		d6.notasPosibles(c6,e6);
		e6.notasPosibles(d6,f6);
		f6.notasPosibles(e6,g6);
		g6.notasPosibles(f6);
		
		//generamos la nota inicial del dictado aleatoramiente
		dictado.add(this.generaNotaInicial());
		System.out.println("nota inicial "+ dictado.get(0).getName());
		dictadoString.add(dictado.get(0).getName());
		int aux=1;
		while(dictado.size()<20)
		{
			dictado.add(dictado.get(aux-1).eligeNotaSiguiente());
			dictadoString.add(dictado.get(aux).getName());
			//System.out.println("agregada nota: "+ dictado.get(aux).getName());
			aux++;
			
		}
		
		//por ahora no regresemas ningun dictado
		return(dictadoString);
	}
	
	//metodo que genera la nota inicial del dictado
	public Nota generaNotaInicial()
	{
		//definimos un random para el numero aleatorio
		Random rnd=new Random();
		//casteamos el aleatorio y lo ponemos en un rango de 0 al numero de notas Posibles
		int aux=(int) (rnd.nextDouble()*this.numNotasposibles);
		
		//retornamos la primera nota
		return(notasPosibles[aux]);
	}

	
	
	

}
