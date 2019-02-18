import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { LoginComponent } from './pages/login/login.component';
import { HomeComponent } from './pages/home/home.component';
import { AreaPesquisaComponent } from './pages/area-pesquisa/area-pesquisa.component';
import { SobrenosComponent } from './pages/sobrenos/sobrenos.component';
import { ConfiguracoesComponent } from './pages/configuracoes/configuracoes.component';

const routes: Routes = [
	{ path: 'login', component: LoginComponent },
	{ path: '', redirectTo: '/home', pathMatch: 'full'},
	{ path: 'home', component: HomeComponent },
	{ path: 'area-pesquisa', component: AreaPesquisaComponent },
	{ path: 'sobrenos', component: SobrenosComponent },
	{ path: 'configuracoes', component: ConfiguracoesComponent },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
