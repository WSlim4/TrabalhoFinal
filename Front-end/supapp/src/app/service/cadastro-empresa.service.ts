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
    return this.http.post(this.apiUrl,{
      name: supplier.nome,
      password: supplier.senha,
      c_password: supplier.senha,
      email: supplier.email,
      phone: supplier.telefone,
      address: supplier.endereco,
      cnpj: supplier.cnpj
    }).pipe( map(res=>res) );
  }

}
