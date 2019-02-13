import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { LoginComponent } from './pages/login/login.component';
import { HomeComponent } from './pages/home/home.component';
import { AreaPesquisaComponent } from './pages/area-pesquisa/area-pesquisa.component';
import { Error404Component } from './pages/error404/error404.component';


const routes: Routes = [
	{ path: 'login', component: LoginComponent },
	{ path: '', redirectTo: '/home', pathMatch: 'full'},
	{ path: 'home', component: HomeComponent },
	{ path: 'area-pesquisa', component: AreaPesquisaComponent },
	{ path: 'error404', component: Error404Component },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
