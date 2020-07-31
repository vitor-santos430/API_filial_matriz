using System;
using System.Net.Http;
using System.Net.Http.Headers;

namespace consumindoAPI
{
    class Program
    {
        static void Main(string[] args)
        {
            // Define URL 
            HttpClient cliente = new HttpClient();
            cliente.BaseAddress = new Uri("http://localhost/");

            // Define cabeçalho HTTP para receber JSON
            cliente.DefaultRequestHeaders.Accept.Add(
                new MediaTypeWithQualityHeaderValue("application/json"));

            // Aguarda Resposta da requisição
            HttpResponseMessage response = cliente.GetAsync("api/v1/estoque/mostrar").Result;

            // Mostra Cabeçalho da requisição
            Console.WriteLine(response);

            if (response.IsSuccessStatusCode)
            {
                
                // Passa resposta do corpo
                var dataObjects = response.Content.ReadAsStringAsync().Result; 

                dynamic resultado = Newtonsoft.Json.JsonConvert.DeserializeObject(dataObjects);

                Console.WriteLine("  **  Produtos filial  ** \n");

                Console.WriteLine("ID\t\tProduto\t\tPreço\n");

                foreach(var dado in resultado.dados)
                {
                    Console.WriteLine("{0}\t \t{1}\t {2}",dado.id, dado.produto, dado.preco);
                }

            }
            else
            {
                Console.WriteLine("{0} ({1})", (int)response.StatusCode, response.ReasonPhrase);
            } 

            Console.ReadKey();
        }
    }
}
