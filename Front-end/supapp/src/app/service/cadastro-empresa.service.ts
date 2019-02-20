import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';
import { map } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class CadastroEmpresaService {

  apiUrl= "http://localhost:8000/api/registersupplier/"

  constructor(private http: HttpClient) { }

  addsupplier(supplier: any): Observable<any>{
    let headers: HttpHeaders = new HttpHeaders({ "Content-Type":"application/x-www-form-urlencoded", "Accept":"application/json" });
    console.log(supplier.nome);
    return this.http.post(this.apiUrl,{
      name: supplier.nome,
      password: supplier.senha,
      c_password: supplier.senha,
      email: supplier.email,
      phone: supplier.telefone,
      address: supplier.endereco,
      cnpj: supplier.cnpj
    },{ headers }).pipe( map(res=>res) );
  }

}
