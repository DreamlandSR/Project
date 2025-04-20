Chart.elements.Rectangle.prototype.draw = function () {
    const ctx = this._chart.ctx;
    const vm = this._view;
    const left = vm.x - vm.width / 2;
    const right = vm.x + vm.width / 2;
    const top = vm.y;
    const bottom = vm.base;
    const radius = 10;

    ctx.beginPath();
    ctx.fillStyle = vm.backgroundColor;
    ctx.strokeStyle = vm.borderColor;
    ctx.lineWidth = vm.borderWidth;

    // Buat sudut melengkung hanya untuk bar naik (top < bottom)
    if (top < bottom) {
      ctx.moveTo(left, top + radius);
      ctx.quadraticCurveTo(left, top, left + radius, top);
      ctx.lineTo(right - radius, top);
      ctx.quadraticCurveTo(right, top, right, top + radius);
      ctx.lineTo(right, bottom);
      ctx.lineTo(left, bottom);
      ctx.closePath();
      ctx.fill();
      if (vm.borderWidth) {
        ctx.stroke();
      }
    }
  };
