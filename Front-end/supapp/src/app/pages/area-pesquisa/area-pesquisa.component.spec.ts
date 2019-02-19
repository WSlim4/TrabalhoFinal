import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AreaPesquisaComponent } from './area-pesquisa.component';

describe('AreaPesquisaComponent', () => {
  let component: AreaPesquisaComponent;
  let fixture: ComponentFixture<AreaPesquisaComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AreaPesquisaComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AreaPesquisaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
