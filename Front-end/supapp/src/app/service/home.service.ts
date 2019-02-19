import { Injectable } from '@angular/core';

import { HttpClient } from '@angular/common/http';
import { map } from "rxjs/operators";
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class HomeService {

  apiUrl: string = "http://localhost:8000/api/";

  constructor( public http: HttpClient ) { }

  getMercadoria(nome:string): Observable<any>{
    return this.http.get( this.apiUrl + nome ).pipe( map(res => res) );
  }
}
