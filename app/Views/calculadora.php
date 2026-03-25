 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CALCULADORA</title>
 </head>
 <body>
    
    <H1>CALCULADORA </H1>
    <p>Este es un view para la caulculadora</p>
    <form action="/calculadora/calcular" method="POST">
         
        <input type="number" name="numero1"> 
         <br> 
        <select name="operacion" >
            <option value="sumar">+</option>
            <option value="restar">-</option>
            <option value="multiplicar">*</option>
            <option value="dividir">/</option>
        </select> 
        <br> 
        <input type="number"  name="numero2"> <br> 

        <button type="submit">Calcular</button>
    </form>

 </body>
 </html>
 