import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.Servlet;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;


public class Calculator extends HttpServlet  {

	
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		PrintWriter out  = response.getWriter();
		String n1 = request.getParameter("txt1");
		String n2 = request.getParameter("txt2");
		String op = request.getParameter("op");
		 out.println("Welcome to Servlet......");
		if(op.equals("Addition")){
            out.println("Answer is ="+(Integer.parseInt(n1) + Integer.parseInt(n2)));
       }
       else if(op.equals("Subtraction")){
    	   out.println("Answer is ="+(Integer.parseInt(n1) - Integer.parseInt(n2)));
       }
       else if(op.equals("multiplication")){
    	   out.println("Answer is ="+(Integer.parseInt(n1) * Integer.parseInt(n2)));
       }
       else{
    	   out.println("Answer is ="+(Integer.parseInt(n1) / Integer.parseInt(n2)));
       }
		
	}
}
