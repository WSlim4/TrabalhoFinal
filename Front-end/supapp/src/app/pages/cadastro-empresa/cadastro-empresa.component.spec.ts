import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CadastroEmpresaComponent } from './cadastro-empresa.component';

describe('CadastroEmpresaComponent', () => {
  let component: CadastroEmpresaComponent;
  let fixture: ComponentFixture<CadastroEmpresaComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CadastroEmpresaComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CadastroEmpresaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
