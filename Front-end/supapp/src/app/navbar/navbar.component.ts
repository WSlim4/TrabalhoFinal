import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.css']
})
export class NavbarComponent implements OnInit {

  logado: boolean;

  currentRoute: string;

  pagina: string;

  constructor(private router: Router) {
    this.logado = false;

  }
  ngOnInit() {
    this.router.events.subscribe(
      () => this.currentRoute = this.router.url
    );

  }

  permission(level: string){
    localStorage.setItem('permission', level);
  }
}
