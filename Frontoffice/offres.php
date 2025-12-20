<section class="section">
  <div class="container">
      <h2>Offres d'emploi & stages</h2>

      <form action="offres.php" method="post">
          <div class="filter-bar">

              <input type="text" name="motcle" placeholder="Mot-clé">

              <select name="type">
                  <option value="">Type</option>
                  <option value="stage">Stage</option>
                  <option value="cdd">CDD</option>
                  <option value="cdi">CDI</option>
                  <option value="alternance">Alternance</option>
              </select>

              <select name="ville">
                  <option value="">Ville</option>
                  <option value="Mamoudzou">Mamoudzou</option>
                  <option value="Dzaoudzi">Dzaoudzi</option>
                  <option value="Koungou">Koungou</option>
              </select>

              <select name="teletravail">
                  <option value="">Télétravail</option>
                  <option value="oui">Oui</option>
                  <option value="non">Non</option>
                  <option value="hybride">Hybride</option>
              </select>

              <button type="submit" class="btn">Filtrer</button>

          </div>

          <div style="margin-top:10px;">
              <button type="reset" class="btn btn-outline">Réinitialiser</button>
          </div>
      </form>
  </div>
</section>
