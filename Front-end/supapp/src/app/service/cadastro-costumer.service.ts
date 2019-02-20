import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';
import { map } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class CadastroCostumerService {

  apiUrl = "http://localhost:8000/api/registercustomer/"

  constructor(private http: HttpClient) { }

  addCostumer(costumer: any): Observable<any>{
    return this.http.post(this.apiUrl,{
      name: costumer.nome,
      password: costumer.senha,
      c_password: costumer.senha,
      email: costumer.email,
      phone: costumer.telefone,
      address: costumer.endereco,
      cnpj: costumer.cnpj
    }).pipe( map(res=>res) );
  }

}
