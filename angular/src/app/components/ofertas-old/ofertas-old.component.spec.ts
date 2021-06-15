import { ComponentFixture, TestBed } from '@angular/core/testing';

import { OfertasOldComponent } from './ofertas-old.component';

describe('OfertasOldComponent', () => {
  let component: OfertasOldComponent;
  let fixture: ComponentFixture<OfertasOldComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ OfertasOldComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(OfertasOldComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
