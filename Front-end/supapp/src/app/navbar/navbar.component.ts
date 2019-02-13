import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.css']
})
export class NavbarComponent implements OnInit {

  constructor() { }

  ngOnInit() {
  }
  onClick(){
    this.clicked=!this.clicked;
  }
  onClick2(){
    this.clicked2=!this.clicked2;
  }

}
