import javax.servlet.*;
import javax.servlet.http.*;
import java.io.*;

public class hitcount extends HttpServlet {
  public void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
    response.setContentType("text/html");
    PrintWriter out = response.getWriter();
    HttpSession session = request.getSession();
    Integer hitCount = (Integer)session.getAttribute("hitCount");
    if(hitCount == null) {
      hitCount = new Integer(0);
    }
    hitCount++;
    session.setAttribute("hitCount", hitCount);
    out.println("<h1>Hit Count </h1>");
    out.println("<p>Hit count: " + hitCount + "</p>");
    out.println("<p>Session Id: " + session.getId() + "</p>");
  }
}
