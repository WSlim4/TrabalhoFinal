import { TestBed } from '@angular/core/testing';

import { CadastroEmpresaService } from './cadastro-empresa.service';

describe('CadastroEmpresaService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: CadastroEmpresaService = TestBed.get(CadastroEmpresaService);
    expect(service).toBeTruthy();
  });
});
