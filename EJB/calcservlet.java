package SessionBean;

import java.io.IOException;
import java.io.PrintWriter;
import javax.ejb.EJB;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author pranay
 */
public class calcservlet extends HttpServlet {
    @EJB
    private calcBeanLocal calcBean;
    
  
   
    
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {
          
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Servlet calcservlet</title>");            
            out.println("</head>");
            out.println("<body>");
             int a = Integer.parseInt(request.getParameter("t1"));
             out.println("<h1> Square is =" + calcBean.squarenumber(a)+"</h1>");
            out.println("<h1>Square Root is ="+calcBean.squareRoot(a)+ " </h1>");
            out.println("<h1> Cube is =" + calcBean.cubenumber(a)+"</h1>");
            out.println("</body>");
            out.println("</html>");
        }
    }
}
