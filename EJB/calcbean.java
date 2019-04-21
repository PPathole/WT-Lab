package SessionBean;
import javax.ejb.Stateless;
@Stateless
public class calcBean implements calcBeanLocal {
 @Override
    public Integer squarenumber(int a) {
        return a*a;
    }
@Override
    public Integer cubenumber(int b) {
        return b*b*b;
    }
@Override
    public Double squareRoot(int c) {
        return Math.sqrt(c);
    }
}
