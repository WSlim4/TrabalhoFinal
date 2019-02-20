import { Injectable } from '@angular/core';

import { HttpClient, HttpHeaders } from '@angular/common/http';
import { map } from "rxjs/operators";
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class HomeService {

  apiUrl: string = "http://localhost:8000/api/carnes/frangos";

  constructor( private http: HttpClient ) { }

  getMercadoria(): Observable<any>{
    let headers: HttpHeaders = new HttpHeaders({ "Content-Type":"application/x-www-form-urlencoded","Accept":"application/json" });
    console.log(headers);
    return this.http.get( this.apiUrl
      ,{ headers} ).pipe( map(res => res) );
  }
}
