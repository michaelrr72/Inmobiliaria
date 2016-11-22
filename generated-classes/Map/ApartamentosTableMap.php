<?php

namespace Map;

use \Apartamentos;
use \ApartamentosQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'apartamentos' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ApartamentosTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.ApartamentosTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'inmobiliaria';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'apartamentos';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Apartamentos';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Apartamentos';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 8;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 8;

    /**
     * the column name for the id field
     */
    const COL_ID = 'apartamentos.id';

    /**
     * the column name for the nombre field
     */
    const COL_NOMBRE = 'apartamentos.nombre';

    /**
     * the column name for the descripcion field
     */
    const COL_DESCRIPCION = 'apartamentos.descripcion';

    /**
     * the column name for the precio field
     */
    const COL_PRECIO = 'apartamentos.precio';

    /**
     * the column name for the latitud field
     */
    const COL_LATITUD = 'apartamentos.latitud';

    /**
     * the column name for the longitud field
     */
    const COL_LONGITUD = 'apartamentos.longitud';

    /**
     * the column name for the id_tipo field
     */
    const COL_ID_TIPO = 'apartamentos.id_tipo';

    /**
     * the column name for the id_comentario field
     */
    const COL_ID_COMENTARIO = 'apartamentos.id_comentario';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'Nombre', 'Descripcion', 'Precio', 'Latitud', 'Longitud', 'IdTipo', 'IdComentario', ),
        self::TYPE_CAMELNAME     => array('id', 'nombre', 'descripcion', 'precio', 'latitud', 'longitud', 'idTipo', 'idComentario', ),
        self::TYPE_COLNAME       => array(ApartamentosTableMap::COL_ID, ApartamentosTableMap::COL_NOMBRE, ApartamentosTableMap::COL_DESCRIPCION, ApartamentosTableMap::COL_PRECIO, ApartamentosTableMap::COL_LATITUD, ApartamentosTableMap::COL_LONGITUD, ApartamentosTableMap::COL_ID_TIPO, ApartamentosTableMap::COL_ID_COMENTARIO, ),
        self::TYPE_FIELDNAME     => array('id', 'nombre', 'descripcion', 'precio', 'latitud', 'longitud', 'id_tipo', 'id_comentario', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Nombre' => 1, 'Descripcion' => 2, 'Precio' => 3, 'Latitud' => 4, 'Longitud' => 5, 'IdTipo' => 6, 'IdComentario' => 7, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'nombre' => 1, 'descripcion' => 2, 'precio' => 3, 'latitud' => 4, 'longitud' => 5, 'idTipo' => 6, 'idComentario' => 7, ),
        self::TYPE_COLNAME       => array(ApartamentosTableMap::COL_ID => 0, ApartamentosTableMap::COL_NOMBRE => 1, ApartamentosTableMap::COL_DESCRIPCION => 2, ApartamentosTableMap::COL_PRECIO => 3, ApartamentosTableMap::COL_LATITUD => 4, ApartamentosTableMap::COL_LONGITUD => 5, ApartamentosTableMap::COL_ID_TIPO => 6, ApartamentosTableMap::COL_ID_COMENTARIO => 7, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'nombre' => 1, 'descripcion' => 2, 'precio' => 3, 'latitud' => 4, 'longitud' => 5, 'id_tipo' => 6, 'id_comentario' => 7, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('apartamentos');
        $this->setPhpName('Apartamentos');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Apartamentos');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('nombre', 'Nombre', 'VARCHAR', true, 30, null);
        $this->addColumn('descripcion', 'Descripcion', 'LONGVARCHAR', true, null, null);
        $this->addColumn('precio', 'Precio', 'INTEGER', true, null, null);
        $this->addColumn('latitud', 'Latitud', 'VARCHAR', true, 50, null);
        $this->addColumn('longitud', 'Longitud', 'VARCHAR', true, 50, null);
        $this->addForeignKey('id_tipo', 'IdTipo', 'INTEGER', 'tipos', 'id', true, null, null);
        $this->addForeignKey('id_comentario', 'IdComentario', 'INTEGER', 'comentarios', 'id', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Tipos', '\\Tipos', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_tipo',
    1 => ':id',
  ),
), 'CASCADE', 'CASCADE', null, false);
        $this->addRelation('Comentarios', '\\Comentarios', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_comentario',
    1 => ':id',
  ),
), 'CASCADE', 'CASCADE', null, false);
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? ApartamentosTableMap::CLASS_DEFAULT : ApartamentosTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Apartamentos object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ApartamentosTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ApartamentosTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ApartamentosTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ApartamentosTableMap::OM_CLASS;
            /** @var Apartamentos $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ApartamentosTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = ApartamentosTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ApartamentosTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Apartamentos $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ApartamentosTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(ApartamentosTableMap::COL_ID);
            $criteria->addSelectColumn(ApartamentosTableMap::COL_NOMBRE);
            $criteria->addSelectColumn(ApartamentosTableMap::COL_DESCRIPCION);
            $criteria->addSelectColumn(ApartamentosTableMap::COL_PRECIO);
            $criteria->addSelectColumn(ApartamentosTableMap::COL_LATITUD);
            $criteria->addSelectColumn(ApartamentosTableMap::COL_LONGITUD);
            $criteria->addSelectColumn(ApartamentosTableMap::COL_ID_TIPO);
            $criteria->addSelectColumn(ApartamentosTableMap::COL_ID_COMENTARIO);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.nombre');
            $criteria->addSelectColumn($alias . '.descripcion');
            $criteria->addSelectColumn($alias . '.precio');
            $criteria->addSelectColumn($alias . '.latitud');
            $criteria->addSelectColumn($alias . '.longitud');
            $criteria->addSelectColumn($alias . '.id_tipo');
            $criteria->addSelectColumn($alias . '.id_comentario');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(ApartamentosTableMap::DATABASE_NAME)->getTable(ApartamentosTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ApartamentosTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ApartamentosTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ApartamentosTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Apartamentos or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Apartamentos object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ApartamentosTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Apartamentos) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ApartamentosTableMap::DATABASE_NAME);
            $criteria->add(ApartamentosTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = ApartamentosQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ApartamentosTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ApartamentosTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the apartamentos table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ApartamentosQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Apartamentos or Criteria object.
     *
     * @param mixed               $criteria Criteria or Apartamentos object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ApartamentosTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Apartamentos object
        }

        if ($criteria->containsKey(ApartamentosTableMap::COL_ID) && $criteria->keyContainsValue(ApartamentosTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ApartamentosTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = ApartamentosQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ApartamentosTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ApartamentosTableMap::buildTableMap();
