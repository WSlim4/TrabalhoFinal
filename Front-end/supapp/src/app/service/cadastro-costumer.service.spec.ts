import { TestBed } from '@angular/core/testing';

import { CadastroCostumerService } from './cadastro-costumer.service';

describe('CadastroCostumerService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: CadastroCostumerService = TestBed.get(CadastroCostumerService);
    expect(service).toBeTruthy();
  });
});
